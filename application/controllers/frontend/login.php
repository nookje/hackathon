<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->model('frontendlogin_model', 'frontendlogin');
		$data['body_model'] 	= $this->frontendlogin;		
		$data['pass_along']['function'] = __FUNCTION__;	

		$this->load->view('main', $data);
	}

}