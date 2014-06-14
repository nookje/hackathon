<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offers_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    

    public function get($hash) 
    {
		$query = $this->db->get_where('offers', array('hash' => $hash));
		return $query->row_array();
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
		$supplier = $this->suppliers->getSupplierByName($offer['supplier']);

		$this->load->library('email');

		$this->email->from($supplier['email'], $supplier['name']);
		$this->email->to('razvan.smarandeanu@e-spres-oh.com'); 

		$this->email->subject("{$supplier['name']} has responded to your request");
		$this->email->message("Check the offer from {$supplier['name']}. The total price is {$offer['price']} delivered on {$offer['delivery']}");	

		$this->email->send();

		$price		= $this->input->get('price', true);
		$delivery 	= $this->input->get('delivery', true);
		$status 	= $this->input->get('status', true);

		if (!$price || !$delivery) {
			return;
		}

		$data = array(
		   'price' 		=> $price,
		   'delivery' 	=> $delivery,
		   'status' 	=> $status,
		);

		$this->db->where('hash', $hash)->where('status', 'opened');
		$this->db->update('offers', $data); 
	}

   	public function accept($offer, $request) 
	{

		$data = array(
		   'delivery_date' 	=> $offer['delivery'],
		   'supplier' 		=> $offer['supplier'],
		   'status' 		=> 'ordered',
		);
		$this->db->where('id', $offer['request_id'])->where('status', 'request_sent');
		$this->db->update('requests', $data); 

		$data = array(
		   'status' 		=> 'ordered',
		);

		$this->db->where('hash', $offer['hash'])->where('status', 'sent');
		$this->db->update('offers', $data); 
	}

}
