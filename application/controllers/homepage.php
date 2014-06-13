<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{		
		$this->load->model('homepage_model', 'homepage');		
		$data['body_model'] 	= $this->homepage;		
		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		$data['title'] 			= $this->translations->get($page = 'homepage_title', $language = LANGUAGE);

		
		if ($this->uri->segment(1) !== false && $data['translations'][40] != $this->uri->segment(1) && LANGUAGE == 'ro') {
			custom_redirect($data['translations'][40]);
		} elseif ($this->uri->segment(1) !== false && $data['translations'][40] != $this->uri->segment(1) && LANGUAGE == 'en') {
			custom_redirect($data['translations'][40]);
		}
	
		$this->load->view('main', $data);
	}
}