<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    
    function display()
    {
		$email 		= $this->input->post('email', true);
		$password 	= $this->input->post('password', true);
		
		$data 		= array();
		
		if ($email && $password) {
			if ($this->authorization->login($email, md5($password)) !== false) {
				custom_redirect('admin');
			} else {
				$data['login_error'] = 'wrong_combination';
			}
		}
				
		$data['email'] 		= $email;
	
		$this->load->view('login', $data);
    }

	
}