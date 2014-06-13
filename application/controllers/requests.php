<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends CI_Controller {

	public function index()
	{


		$this->load->model('requests_model', 'requests');		


		$result = $this->requests->loadRequests();
		header('Content-Type: application/json');
		echo json_encode($result);
	}


	
}