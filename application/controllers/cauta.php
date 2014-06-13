<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cauta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
	}

	public function cod()
	{	
	
		$data['translations'] 	= $this->translations->get($page = 'main', LANGUAGE);
		$data['categories'] 	= $this->config->item('categories');

		$this->load->model('produse_model', 'produse');		
		$data['body_model'] 			= $this->produse;		
		$data['pass_along']['function'] = __FUNCTION__;	
			
		$this->load->view('main', $data);
	}
	
	public function nume()
	{	
	
		$data['translations'] 	= $this->translations->get($page = 'main', LANGUAGE);
		$data['categories'] 	= $this->config->item('categories');

		$this->load->model('produse_model', 'produse');		
		$data['body_model'] 			= $this->produse;		
		$data['pass_along']['function'] = __FUNCTION__;	
			
		$this->load->view('main', $data);
	}
	
	
}