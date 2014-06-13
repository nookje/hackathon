<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_news extends CI_Controller {

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
				
		$this->load->model('admin_news_model', 'admin');
		$data['body_model'] 	= $this->admin;		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		
		$this->load->view('main', $data);
	}
	
	public function noutate()
	{

		$this->load->model('admin_news_model', 'admin');
		$data['body_model'] 	= $this->admin;		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		
		$insert['title_ro'] 	= $this->input->post('title_ro', true);
		$insert['title_en'] 	= $this->input->post('title_en', true);
		
		$insert['description_ro'] 	= $this->input->post('description_ro', true);
		$insert['description_en'] 	= $this->input->post('description_en', true);
		$insert['period'] 			= $this->input->post('period', true);		

		if (!isset($data['error'])) {				
			$this->db->insert('news', $insert);
			$data['success'] = 1;
			$id = $this->db->insert_id();
				
				
			if(isset($_FILES['poza']['tmp_name']) && $_FILES['poza']['tmp_name']) {
				$upload_path = getcwd() . '/static/images/noutati/' . $id . '/';
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
					make_thumb($image, $thumb_path, $max_width = 130, $max_height = 130, $compensate = 'crop');
				
				}
			}
			
			if(isset($_FILES['poster']['tmp_name']) && $_FILES['poster']['tmp_name']) {
				$upload_path = getcwd() . '/static/images/noutati/' . $id . '/';
				$poster_path = $upload_path . 'poster/';
	
				$pathinfo = pathinfo($_FILES['poster']['name']);
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
					if(!is_dir($poster_path))
						mkdir($poster_path);
	
					$pathinfo['filename'] = titleize($pathinfo['filename']);
	
					$poster = $poster_path . $pathinfo['filename'] . '.' . $pathinfo['extension'];
					move_uploaded_file($_FILES['poster']['tmp_name'], $poster);
				}
			}	
			
				
		}
		$this->load->view('main', $data);
	}
	
	public function sterge_noutate($id)
	{
		$q = "	SELECT * 
				FROM news
				WHERE  id = {$id}
				";
		$query = $this->db->query($q);
		
		if ($query->num_rows()) {
		
			$path = getcwd() . '/static/images/noutati/' . $id . '/';
			if(is_dir($path)) {
				$this->load->helper('unlink');
				unlinkRecursive($path, $deleteRootToo = true);
			}
			$this->db->where('id', $id);
			$this->db->delete('news');
			
			echo 'Noutatea a fost stearsa cu succes';
		} else {
			echo 'Noutatea nu a fost gasita sau a fost stearsa deja';
		}
	}	
	
	
	public function editeaza_noutate($id)
	{
	
		$this->load->model('admin_news_model', 'admin');
		$data['body_model'] 	= $this->admin;		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		
		$data['pass_along']['function'] = __FUNCTION__;	
		$data['pass_along']['id'] 		= $id;	
	
		$this->load->view('main', $data);
	}	

	public function sterge_poza_noutate($id, $poza)
	{
		$q = "	SELECT * 
				FROM news
				WHERE  id = {$id}
				";
		$query = $this->db->query($q);
		
		if ($query->num_rows()) {
		
			$path 		= getcwd() . '/static/images/noutati/' . $id . '/' . $poza;
			$thumb_path = getcwd() . '/static/images/noutati/' . $id . '/thumbnails/' . $poza;
			
			if(is_file($path)) {
				unlink($path);
			}
			if(is_file($thumb_path)) {
				unlink($thumb_path);
			}
			echo 'Poza a fost stearsa cu succes';
		} else {
			echo 'Poza nu a fost gasita sau a fost stearsa deja';
		}
	}	
	
	public function sterge_poster_noutate($id, $poster)
	{
		$q = "	SELECT * 
				FROM news
				WHERE  id = {$id}
				";
		$query = $this->db->query($q);
		
		if ($query->num_rows()) {
		
			$poster_path = getcwd() . '/static/images/noutati/' . $id . '/poster/' . $poster;
			
			if(is_file($poster_path)) {
				unlink($poster_path);
				echo 'Poster-ul a fost sters cu success';
			} else {
				echo 'Poster-ul nu a fost gasit sau a fost sters deja';
			}
		} else {
				echo 'Poster-ul nu a fost gasit sau a fost sters deja';
		}
	}		
	


}
