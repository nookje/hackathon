<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Despre extends CI_Controller {

	public function index()
	{	
		$this->load->helper('url');	
		$this->load->model('despre_model', 'despre');		
		$data['body_model'] 	= $this->despre;		
		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		$data['title'] 			= $this->translations->get($page = 'homepage_title', $language = LANGUAGE);

		if ($data['translations'][41] != $this->uri->segment(1) && LANGUAGE == 'ro') {
			custom_redirect($data['translations'][41]);
		} elseif ($data['translations'][41] != $this->uri->segment(1) && LANGUAGE == 'en') {
			custom_redirect($data['translations'][41]);
		}

		$this->load->view('main', $data);
	}
}