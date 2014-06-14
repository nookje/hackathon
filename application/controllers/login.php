<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{

 

		send_push_notification('logged in bo$$');

		if (count($_GET)) {
			$email 		= $this->input->get('email', true);
			$role 		= $this->input->get('role', true);
			$password 	= $this->input->get('password', true);

			$result = $this->authorization->login($email, $role, $password);

			if ($result === false) {
				$result['authorized'] = false;
			} 
		} else {
			$this->load->library('session');
			if ($this->authorization->session_item('authorized') === true) {
				$result = $this->authorization->get_all_session_items();
			} else {
				$result['authorized'] = false;
			}
		}
		header('Content-Type: application/json');
		echo json_encode($result);
		return;
	}

	public function logout()
	{
		$this->authorization->logout();
		custom_redirect('login');

	}
	
}