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


   	public function send($hash) 
	{

$this->load->library('email');

// $config['protocol'] = 'sendmail';
// $config['mailpath'] = '/usr/sbin/sendmail';
// $config['charset'] = 'iso-8859-1';
// $config['wordwrap'] = TRUE;

// $this->email->initialize($config);


$this->email->from('your@example.com', 'Your Name');
$this->email->to('razvan.smarandeanu@e-spres-oh.com'); 

$this->email->subject('Email Test');
$this->email->message('Testing the email class.');	

$this->email->send();

echo $this->email->print_debugger();


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

}
