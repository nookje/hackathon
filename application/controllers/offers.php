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
}