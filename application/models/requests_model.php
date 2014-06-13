<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    
    function loadRequests($direction = '', $reference = '', $id = '')
    {
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
					ORDER BY delivery_date {$order}
					LIMIT 3
			";

			$query = $this->db->query($q);
			
			$result = $query->result_array();

    	} else {
			$q = "	SELECT * FROM (SELECT delivery_date 
				FROM requests
				WHERE delivery_date < now()
				ORDER BY delivery_date DESC
				LIMIT 3) as T ORDER BY T.delivery_date ASC
			";

			$query = $this->db->query($q);
			$result1 = $query->result_array();

			$q = "	SELECT delivery_date 
				FROM requests
				WHERE delivery_date >= now()
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
