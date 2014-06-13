<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{	
		$this->load->helper('url');	
		$this->load->model('contact_model', 'contact');		
		$data['body_model'] 	= $this->contact;		
		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		$data['title'] 			= $this->translations->get($page = 'homepage_title', $language = LANGUAGE);

		$response['errors'] = '';
		$response['status'] = '';
		$inputs = array();

		if (count($_POST)) {
			$inputs['captcha'] 	= $this->input->post('captcha', true);
			$inputs['nume'] 	= $this->input->post('nume', true);
			$inputs['prenume'] 	= $this->input->post('prenume', true);
			$inputs['email'] 	= $this->input->post('email', true);
			$inputs['telefon'] 	= $this->input->post('telefon', true);
			$inputs['mesaj'] 	= $this->input->post('mesaj', true);
		
			//verific daca adresa de e-mail e valida
			$this->load->library('form_validation');
			if (!$this->form_validation->valid_email($inputs['email'])) {
				$response['status'] = 'failure';
				$response['errors'] .= 'Va rugam sa introduceti o adresa de e-mail valida! <br>';
			}

			if (strlen($inputs['mesaj']) == 0 ) {
				$response['status'] = 'failure';
				$response['errors'] .= 'Trebuie sa completati mesajul. <br>';
			}

			if ($inputs['captcha'] != $this->session->userdata('contact_captcha')) {
				$response['status'] = 'failure';
				$response['errors'] .= 'Codul de securitate este completat incorect. <br>';
			}
			
			if ($response['status'] != 'failure') {			
				$this->load->library('email');
				
				$this->email->from($inputs['email'], $inputs['nume']);
				$this->email->to('razvansg@yahoo.com');
				$this->email->subject('Contact email');
				$content = 	"Nume: " . $inputs['nume'] . "\n" 
							. "Prenume: " . $inputs['prenume'] . "\n" 
							. "Telefon: " . $inputs['telefon'] . "\n" 
							. "Mesaj: " . $inputs['mesaj']; 
				$this->email->message($content);
				
				if ($this->email->send()) {
					$response['status'] = 'success';
				} else  {
					$response['errors'] .= 'Emailul nu a fost trimis, va rugam sa reincercati mai tarziu. <br>';				
					$response['failure'] = 'success';
				}
			}
			
		}
		$data['inputs'] 	= $inputs;
		$data['response'] 	= $response;

		$this->load->view('main', $data);
	}
}
