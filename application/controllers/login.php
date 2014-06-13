<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		if ($this->session->userdata('authorized') === true) {
			custom_redirect('admin');
		}
				
		$this->load->model('login_model', 'login');
		$data['body_model'] 	= $this->login;		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		
		$this->load->view('main', $data);
	}

	public function logout()
	{
		$this->authorization->logout();
		custom_redirect('homepage');
	}
	
}