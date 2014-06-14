<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offers extends CI_Controller {

	public function index()
	{
	}


	public function show($hash)
	{
		$this->load->model('offers_model', 'offers');		

		$this->offers->markOpened($hash);
		$result = $this->offers->get($hash);

		header('Content-Type: application/json');
		echo json_encode($result);
	}


	public function send($hash)
	{
		$this->load->model('offers_model', 'offers');		

		$this->offers->send($hash);
		$result = $this->offers->get($hash);

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function accept($hash)
	{
		$this->load->model('offers_model', 'offers');		
		$offer = $this->offers->get($hash);

		$this->load->model('requests_model', 'requests');		
		$request = $this->requests->get($offer['request_id']);

		if ($request['status'] == 'request_sent' && $offer['status'] == 'sent') {
			$this->offers->accept($offer, $request);
		}

		header('Content-Type: application/json');
		echo json_encode($request);
	}

}