<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
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

    	if ($direction && $reference && $id) {
    		if ($direction == '<') {
    			$order = 'DESC';
    		} else {
    			$direction = '>';
    			$order = 'ASC';
    		}

			$q = "	SELECT delivery_date 
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
			$q = "	SELECT * FROM (SELECT delivery_date 
				FROM requests
				WHERE delivery_date < now()
				{$condition}
				ORDER BY delivery_date DESC
				LIMIT 3) as T ORDER BY T.delivery_date ASC
			";

			$query = $this->db->query($q);
			$result1 = $query->result_array();

			$q = "	SELECT delivery_date 
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
}
