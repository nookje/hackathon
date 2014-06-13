<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Homepage_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
    
    public function display()
    {
		$data['translations'] = 'aaa';
		$this->load->view('homepage', $data);
    }
	
}
