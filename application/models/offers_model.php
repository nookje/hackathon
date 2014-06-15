<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offers_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    

    public function get($hash) 
    {

		$q = "	SELECT *, offers.supplier as offer_supplier, offers.status as offer_status , offers.price as offer_price
				FROM offers
				JOIN requests ON requests.id = offers.request_id
				WHERE hash = '{$hash}'
		";

		$query = $this->db->query($q);
		
		$result = $query->row_array();
		return $result;
    }
 

   	public function markOpened($hash) 
	{
		$data = array(
		   'status' 	=> 'opened',
		);

		$this->db->where('hash', $hash)->where('status', 'unopened');
		$this->db->update('offers', $data); 
	}


   	public function respond($hash) 
	{
		$offer = $this->get($hash);

		$this->load->model('suppliers_model', 'suppliers');		
		$supplier = $this->suppliers->getSupplierByName($offer['offer_supplier']);

		$price		= $this->input->post('price', true);
		$delivery 	= $this->input->post('delivery_date', true);
		$status 	= $this->input->post('status', true);

		if (!$price || !$delivery || !$status) {
			return;
		}

		$data = array(
		   'price' 		=> $price,
		   'delivery' 	=> $delivery,
		   'status' 	=> $status,
		);

		$this->db->where('hash', $hash)->where('status', 'opened');
		$this->db->update('offers', $data); 

		if ($status == 'accepted') {

			$this->load->library('email');

			$this->email->from($supplier['email'], $supplier['name']);
			$this->email->to('razvan.smarandeanu@e-spres-oh.com'); 

			$this->email->subject("{$supplier['name']} has sent you an offer");
			$this->email->message("Check the offer from {$supplier['name']}. The total price is {$price} delivered on {$delivery}");	

			$this->email->send();

			$push_notification_message = "{$supplier['name']} has sent you an offer";
			send_push_notification($push_notification_message);
		}


	}

   	public function accept($offer, $request) 
	{

		$data = array(
		   'delivery_date' 	=> $offer['delivery'],
		   'supplier' 		=> $offer['supplier'],
		   'price' 			=> $offer['offer_price'],
		   'status' 		=> 'ordered',
		);
		$this->db->where('id', $offer['request_id'])->where('status', 'request_sent');
		$this->db->update('requests', $data); 

		$data = array(
		   'status' 		=> 'ordered',
		);

		$this->db->where('hash', $offer['hash'])->where('status', 'accepted');
		$this->db->update('offers', $data); 
	}

    public function getOffersByRequestId($request_id) 
    {
		$query = $this->db->get_where('offers', array('request_id' => $request_id));
		return $query->result_array();
    }

}
