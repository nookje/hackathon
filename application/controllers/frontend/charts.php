<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts extends CI_Controller {

	public function index()
	{
		$this->load->model('frontendcharts_model', 'frontendcharts');
		$data['body_model'] 	= $this->frontendcharts;		
		$data['pass_along']['function'] = __FUNCTION__;	

		$this->load->view('main', $data);
	}



	public function top()
	{
		$this->load->model('frontendcharts_model', 'frontendcharts');
		$data['body_model'] 	= $this->frontendcharts;		
		$data['pass_along']['function'] = __FUNCTION__;	

		$this->load->view('main', $data);
	}

	public function top_locations()
	{
		$this->load->model('frontendcharts_model', 'frontendcharts');
		$data['body_model'] 	= $this->frontendcharts;		
		$data['pass_along']['function'] = __FUNCTION__;	

		$this->load->view('main', $data);
	}


	public function total_per_month()
	{
		$this->load->model('frontendcharts_model', 'frontendcharts');
		$data['body_model'] 	= $this->frontendcharts;		
		$data['pass_along']['function'] = __FUNCTION__;	

		$this->load->view('main', $data);
	}

	public function top_suppliers()
	{
		$this->load->model('frontendcharts_model', 'frontendcharts');
		$data['body_model'] 	= $this->frontendcharts;		
		$data['pass_along']['function'] = __FUNCTION__;	

		$this->load->view('main', $data);
	}

}