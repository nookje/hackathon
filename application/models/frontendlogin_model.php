<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontendlogin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    
    function display()
    {
		$data 		= array();
		$this->load->view('login', $data);
    }

	
}