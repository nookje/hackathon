<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{		
		$this->load->model('homepage_model', 'homepage');		
		$data['body_model'] 	= $this->homepage;		
		

		$this->load->view('main', $data);
	}
}