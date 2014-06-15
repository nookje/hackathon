<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    


    function newRequests()
    {
    
		$q = "	SELECT * 
			FROM requests
			WHERE status = 'request'
		";

		$query = $this->db->query($q);
		
		$result = $query->result_array();

		return $result;
    }

    function loadRequests()
    {
    
		$direction 		= $this->input->get('direction', true);
		$reference 		= $this->input->get('reference', true);
		$id 			= $this->input->get('id', true);

		$status 		= $this->input->get('status', true);
		$supplier 		= $this->input->get('supplier', true);
		$supplier_type 	= $this->input->get('supplier_type', true);
		$location 		= $this->input->get('location', true);

    	$condition = '';
    	if ($status) {
    		$condition .= " AND status = '{$status}' ";
    	}

    	if ($supplier) {
    		$condition .= " AND supplier = '{$supplier}' ";
    	}

    	if ($supplier_type) {
    		$condition .= " AND supplier_type = '{$supplier_type}' ";
    	}

    	if ($location) {
    		$condition .= " AND location = '{$location}' ";
    	}

		$email = $this->authorization->session_item('email');	

    	if ($this->authorization->session_item('role') !== 'administrator') {
    		$condition .= " AND requester = '{$email}' ";
    	}

    	if ($direction && $reference && $id) {
    		if ($direction == '<') {
    			$order = 'DESC';
    		} else {
    			$direction = '>';
    			$order = 'ASC';
    		}

			$q = "	SELECT * 
					FROM requests
					WHERE delivery_date {$direction}= '{$reference}' 
					AND id != {$id}
					{$condition}
					ORDER BY delivery_date {$order}
					LIMIT 3
			";

			$query = $this->db->query($q);
			
			$result = $query->result_array();

    	} else {
			$q = "	SELECT * FROM (SELECT * 
				FROM requests
				WHERE delivery_date < now()
				{$condition}
				ORDER BY delivery_date DESC
				LIMIT 3) as T ORDER BY T.delivery_date ASC
			";

			$query = $this->db->query($q);
			$result1 = $query->result_array();

			$q = "	SELECT * 
				FROM requests
				WHERE delivery_date >= now()
				{$condition}
				ORDER BY delivery_date ASC
				LIMIT 3
			";

			$query = $this->db->query($q);
			$result2 = $query->result_array();

			$result = array_merge($result1, $result2);
    	}

		return $result;
    }


    public function addRequest()
    {
    	if ($this->authorization->session_item('authorized') !== true) {
    		return;
    	}

		$description	= $this->input->get('description', true);
		$link 			= $this->input->get('link', true);
		$urgency 		= $this->input->get('urgency', true);

		$date = date('Y-m-d H:i:s');

		$data = array(
		   'description' 	=> $description,
		   'link' 			=> $link ,
		   'urgency' 		=> $urgency,
		   'requester' 		=> $this->authorization->session_item('email'),
		   'status' 		=> 'request',
		   'date'			=> $date,
		   'delivery_date'	=> $date,
		);

		$this->db->insert('requests', $data); 

		$parts = explode('@', $this->authorization->session_item('email'));
		$push_notification_message = $parts[0] . " has made a request!";
		send_push_notification($push_notification_message);
    }


    public function editRequest($id)
    {
    	if ($this->authorization->session_item('role') !== 'administrator') {
    		return;
    	}

		$description	= $this->input->post('description', true);
		$link 			= $this->input->post('link', true);
		$urgency 		= $this->input->post('urgency', true);
		$supplier 		= $this->input->post('supplier', true);
		$delivery_date 	= $this->input->post('delivery_date', true);
		$location 		= $this->input->post('location', true);
		$supplier_type 	= $this->input->post('supplier_type', true);
		$status 		= $this->input->post('status', true);

		$data = array(
		   'description' 	=> $description,
		   'link' 			=> $link ,
		   'urgency' 		=> $urgency,
		   'supplier'		=> $supplier,
		   'delivery_date'	=> $delivery_date . ' 12:00:00',
		   'status' 		=> $status,
		   'supplier_type'	=> $supplier_type,
		   'location'		=> $location,
		);
		$this->db->where('id', $id);
		$this->db->update('requests', $data); 
    }


    public function sendRequestOffer($id)
    {

    	if ($this->authorization->session_item('role') !== 'administrator') {
    		return;
    	}

    	$request = $this->get($id);

    	if ($request['status'] !== 'request') {
    		return;
    	} 
    	
		$this->load->model('suppliers_model', 'suppliers');		
		$suppliers = $this->suppliers->getSuppliersByType($request['supplier_type']);

		$data['request_id'] = $id;

		$this->load->library('email');

		$email = $this->authorization->session_item('email');
		$parts = explode('@', $email);
		$name = $parts[0];

		foreach ($suppliers as $val) {
			$hash = md5($val['name'] . microtime() . rand(1,999999));
			$data = array(
			   'request_id' 	=> $id,
			   'supplier' 		=> $val['name'] ,
			   'status' 		=> 'unopened',
			   'hash' 			=> $hash,
			);
			$insert_query = $this->db->insert_string('offers', $data);
			$insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
			$this->db->query($insert_query); 

			// send email
			$this->email->from($email, $name);
			$this->email->to($val['email']); 

			$this->email->subject("{$name} has sent you an offer request");
			$this->email->message("Click the link bellow to respond to the request: {$this->config->item('complete_base_url')}/frontend/offers/show/{$hash}");	

			$this->email->send();
		}

		$data = array(
		   'status' 		=> 'request_sent',
		);

		$this->db->where('id', $id);
		$this->db->update('requests', $data); 
    }


    public function get($id) 
    {
		$query = $this->db->get_where('requests', array('id' => $id));
		return $query->row_array();
    }
}
