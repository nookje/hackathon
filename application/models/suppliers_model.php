<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suppliers_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    
    function getSuppliersByType($type)
    {
		$q = "	SELECT * 
				FROM suppliers
				WHERE type = '{$type}'
		";
    
		$query = $this->db->query($q);
		
		$result = $query->result_array();
		return $result;
    }


}
