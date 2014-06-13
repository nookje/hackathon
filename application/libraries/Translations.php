<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Translations 
{
    private $ci	= false;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->database();
    }
	
    public function get($page = 'homepage', $language = 'ro')
    {
		$this->ci->db->select('*')->from('translations')->where('language', $language)->where('page', $page);
		$query = $this->ci->db->get();
		
		if ($query->num_rows() == 0) {
			return false;
		}
		
		$result = $query->result_array();
		foreach ($result as $val) {
			$translations[$val['key']] = $val['text'];
		}

		return $translations;
    }
	

}
