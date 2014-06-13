<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {
	
	private $username = 'guest';
	private $password = 'guest';
	
	public function index()
	{	
		$this->load->helper('url');	
		$this->load->model('download_model', 'download');		
		$data['body_model'] 	= $this->download;		
		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		$data['title'] 			= $this->translations->get($page = 'homepage_title', $language = LANGUAGE);

		$this->load->view('main', $data);
	}
	
	function catalog($id = false)
	{
		$categories 	= $this->config->item('categories');

		if (!isset($_SERVER['PHP_AUTH_USER'])) {
			header("WWW-Authenticate: Basic realm=\"Private Area\"");
			header("HTTP/1.0 401 Unauthorized");
			print "Sorry - you need valid credentials to be granted access!\n";
			exit;
		} else {
			if (($_SERVER['PHP_AUTH_USER'] == $this->username) && ($_SERVER['PHP_AUTH_PW'] == $this->password)) {

				if (isset($categories[$id])) {
					$filename = $categories[$id]['title_' . LANGUAGE] . ".pdf";
					
					header("Content-Disposition: attachment; filename='{$filename}'");
					
					$path = getcwd() . '/static/images/download/private_download/' . $id . '.pdf';
					
					readfile($path);
				} else {
					print "Catalogue not found!\n";				
				}

			} else {
				header("WWW-Authenticate: Basic realm=\"Private Area\"");
				header("HTTP/1.0 401 Unauthorized");
				print "Sorry - you need valid credentials to be granted access!\n";
				exit;
			}
		}
		
	}
	
	
	function brosura($id = false)
	{
		if (in_array($id, array(155,156))) {
		
			$translations 	= $this->translations->get($page = 'download', $language = LANGUAGE);
			
			$filename = $translations[$id] . ".pdf";
			
			header("Content-Disposition: attachment; filename='{$filename}'");
			
			$path = getcwd() . '/static/images/download/brosuri/' . $id . '.pdf';
			
			readfile($path);
		} else {
			print "Brochure not found!\n";				
		}
	}		
}