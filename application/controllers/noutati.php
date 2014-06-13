<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noutati extends CI_Controller {

	public function lista($page = 1)
	{	
		$this->load->helper('url');	
		$this->load->model('noutati_model', 'noutati');		
		$data['body_model'] 	= $this->noutati;		
		
		$data['translations'] 	= $this->translations->get($section = 'main', $language = LANGUAGE);
		$data['title'] 			= $this->translations->get($section = 'homepage_title', $language = LANGUAGE);
		$data['pass_along']['function'] = __FUNCTION__;	
		$data['pass_along']['page'] = $page;	
				
		$this->load->view('main', $data);
	}

	public function index()
	{
		custom_redirect('noutati/lista');
	}

	public function vezi($id)
	{	
		$id = (int) $id;
		
		$this->load->model('noutati_model', 'noutati');	
			
		$data['body_model'] 	= $this->noutati;				
		$data['translations'] 	= $this->translations->get($section = 'main', LANGUAGE);
		$data['title'] 			= $this->translations->get($section = 'produse_title', LANGUAGE);
				
		$data['pass_along']['function'] = __FUNCTION__;	
		$data['pass_along']['id'] 		= $id;	
		
		$this->load->view('main', $data);
	}		
}
