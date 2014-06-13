<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_despre extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata('authorized') !== true) {
			custom_redirect('login');
		}
	}

	public function index()
	{
				
		$this->load->model('admin_despre_model', 'admin');
		$data['body_model'] 	= $this->admin;		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		
		
		$section = $this->input->post('section', true);
		if ($section != 'company') {
			$section = 'stocks';
		}
	
	
		if(isset($_FILES['poza']['tmp_name']) && $_FILES['poza']['tmp_name']) {
			$upload_path = getcwd() . '/static/images/despre/' . $section . '/';
			$thumb_path = $upload_path . 'thumbnails/';

			$pathinfo = pathinfo($_FILES['poza']['name']);
			$pathinfo['extension'] = strtolower($pathinfo['extension']);

			// normalize jpeg extension to jpg
			if($pathinfo['extension'] == 'jpeg')
				$pathinfo['extension'] = 'jpg';
				

			// if extension is not allowed
			if( !in_array($pathinfo['extension'], array('jpg', 'png'))) {
				$data['error'][] = 'Poza trebuie sa fie o imagine de tip png sau jpg.<br>';
			} else {

				// create directory if it doesnt exist
				if(!is_dir($upload_path))
					mkdir($upload_path);
				if(!is_dir($thumb_path))
					mkdir($thumb_path);
				
				$pathinfo['filename'] = titleize($pathinfo['filename']);
				
				$image = $upload_path . $pathinfo['filename'] . '.' . $pathinfo['extension'];
				move_uploaded_file($_FILES['poza']['tmp_name'], $image);
			
				// make thumbnail 
				$this->load->helper('thumbnail');
				$thumb_path .=  $pathinfo['filename'] . '.' . $pathinfo['extension'];
				make_thumb($image, $thumb_path, $max_width = 140, $max_height = 140, $compensate = 'crop');
			
			}
		}
			
		$this->load->view('main', $data);
	}
	
	
	public function sterge_poza($section, $poza)
	{
		if ($section != 'company') {
			$section = 'stocks';
		}
	
		$path 		= getcwd() . '/static/images/despre/' . $section. '/' . $poza;
		$thumb_path = getcwd() . '/static/images/despre/' . $section . '/thumbnails/' . $poza;
		
		if(is_file($path)) {
			unlink($path);
		}
		if(is_file($thumb_path)) {
			unlink($thumb_path);
		}
		echo 'Poza a fost stearsa cu succes';
	}	
	
	


}
