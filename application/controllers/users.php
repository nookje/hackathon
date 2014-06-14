<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
	}

	public function top()
	{
		$this->load->model('users_model', 'users');		

		$result = $this->users->getTopUsers();

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function all_requests()
	{
		$this->load->model('users_model', 'users');		

		$user	= $this->input->get('user', true);
		$result = $this->users->getAllRequestsByUser($user);

		header('Content-Type: application/json');
		echo json_encode($result);
	}



	public function top_locations()
	{
		$this->load->model('users_model', 'users');		

		$result = $this->users->getTopLocations();

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function location_all_requests()
	{
		$this->load->model('users_model', 'users');		

		$location	= $this->input->get('location', true);
		$result = $this->users->getAllRequestsByLocation($location);

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function total_by_month()
	{
		$this->load->model('users_model', 'users');		

		$result = $this->users->getTotalPerMonth();

		header('Content-Type: application/json');
		echo json_encode($result);
	}

}