<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends CI_Controller {

	public function index()
	{


		$this->load->model('requests_model', 'requests');		

		$direction 		= $this->input->get('direction', true);
		$reference 		= $this->input->get('reference', true);
		$id 			= $this->input->get('id', true);

		if ($direction && $reference && $id) {
			$result = $this->requests->loadRequests($direction, $reference, $id);
		} else {
			$result = $this->requests->loadRequests();
		}



		echo json_encode($result);
	}


	
}