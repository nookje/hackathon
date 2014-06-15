<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts extends CI_Controller {



	public function top()
	{
        $this->load->model('users_model', 'users');     

        $result = $this->users->getTopUsers();

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


	public function total_per_month()
	{
        $this->load->model('users_model', 'users');     

        $result = $this->users->getTotalPerMonth();

		header('Content-Type: application/json');
		echo json_encode($result);
	}

}