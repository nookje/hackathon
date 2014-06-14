<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    
    function getTopUsers()
    {
		$q = "	SELECT requester AS name, sum(price) AS total, count(1) AS cnt 
				FROM `requests` GROUP BY requester ORDER BY sum(price) DESC LIMIT 5
		";
    
		$query = $this->db->query($q);
		
		$result = $query->result_array();
		return $result;
    }

    function getAllRequestsByUser($user)
    {
		$q = "	SELECT * FROM requests
				WHERE requester = '{$user}'
		";
    
		$query = $this->db->query($q);
		
		$result = $query->result_array();
		return $result;
    }
    
    function getTopLocations()
    {
		$q = "	SELECT location AS name, sum(price) AS total, count(1) AS cnt 
				FROM `requests` GROUP BY location ORDER BY sum(price) DESC LIMIT 5
		";
    
		$query = $this->db->query($q);
		
		$result = $query->result_array();
		return $result;
    }

    function getAllRequestsByLocation($location)
    {
		$q = "	SELECT * FROM requests
				WHERE location = '{$location}'
		";
    
		$query = $this->db->query($q);
		
		$result = $query->result_array();
		return $result;
    }
    

    function getTotalPerMonth()
    {

		$q = "	SELECT DATE_FORMAT(delivery_date, '%Y-%m') as name, sum(price) as total, count(1) as cnt
				FROM `requests`
				WHERE DATE_FORMAT(delivery_date, '%Y-%m') > DATE_FORMAT(DATE_SUB(now(), INTERVAL 6 MONTH), '%Y-%m')
				GROUP BY name
				ORDER BY NAME DESC
		";
    
		$query = $this->db->query($q);
		
		$result = $query->result_array();
		return $result;
    }


}
