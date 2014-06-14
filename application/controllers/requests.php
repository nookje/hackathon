<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends CI_Controller {

	public function index()
	{
		$this->load->model('requests_model', 'requests');		

		$result = $this->requests->loadRequests();
		header('Content-Type: application/json');
		echo json_encode($result);
	}


	public function add()
	{
		$this->load->model('requests_model', 'requests');		

		$result = $this->requests->addRequest();

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function edit($id)
	{
		$this->load->model('requests_model', 'requests');		

		$result = $this->requests->editRequest($id);

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function requestOffer($id)
	{
		$this->load->model('requests_model', 'requests');		

		$this->requests->sendRequestOffer($id);
		$result = $this->requests->get($id);
		
		header('Content-Type: application/json');
		echo json_encode($result);
	}	
}