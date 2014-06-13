<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
				
		$this->load->model('admin_model', 'admin');
		$data['body_model'] 	= $this->admin;		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		
		$insert['title_ro'] 	= $this->input->post('title_ro', true);
		$insert['title_en'] 	= $this->input->post('title_en', true);
		
		$insert['description_ro'] 	= $this->input->post('description_ro', true);
		$insert['description_en'] 	= $this->input->post('description_en', true);
		
		$insert['code'] 		= $this->input->post('code', true);
		$insert['category'] 	= $this->input->post('category', true);		

		$data['result'] = $insert;		
		$this->load->view('main', $data);
	}
	
	public function produs()
	{

		$this->load->model('admin_model', 'admin');
		$data['body_model'] 	= $this->admin;		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		
		$insert['title_ro'] 	= $this->input->post('title_ro', true);
		$insert['title_en'] 	= $this->input->post('title_en', true);
		
		$insert['description_ro'] 	= $this->input->post('description_ro', true);
		$insert['description_en'] 	= $this->input->post('description_en', true);
		
		$insert['code'] 		= $this->input->post('code', true);
		$insert['category'] 	= $this->input->post('category', true);
		
		
		if ($insert['category'] == 0) {
			$data['error'][] = 'Trebuie sa selectati o categorie';
		}
		
		if (!$insert['code']) {
			$data['error'][] = 'Trebuie sa introduceti codul produsului';
		}
		
		if (!isset($data['error'])) {				
			$this->db->insert('products', $insert);
			$data['success'] = 1;
			$id = $this->db->insert_id();
				
				
			if(isset($_FILES['poza']['tmp_name']) && $_FILES['poza']['tmp_name']) {
				$upload_path = getcwd() . '/static/images/produse/' . $id . '/';
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
					make_thumb($image, $thumb_path, $max_width = 140, $max_height = 160, $compensate = 'crop');
				
				}
			}
			
			if(isset($_FILES['pdf']['tmp_name']) && $_FILES['pdf']['tmp_name']) {
				$upload_path = getcwd() . '/static/images/produse/' . $id . '/';
				$pdf_path = $upload_path . 'pdf/';
	
				$pathinfo = pathinfo($_FILES['pdf']['name']);
				$pathinfo['extension'] = strtolower($pathinfo['extension']);
	
	
				// if extension is not allowed
				if( !in_array($pathinfo['extension'], array('pdf'))) {
					$data['error'][] = 'Schita tehnica trebuie sa fie un PDF.<br>';
				} else {
	
					// create directory if it doesnt exist
					if(!is_dir($upload_path))
						mkdir($upload_path);
					if(!is_dir($pdf_path))
						mkdir($pdf_path);
	
					$pathinfo['filename'] = titleize($pathinfo['filename']);
	
					$pdf = $pdf_path . $pathinfo['filename'] . '.' . $pathinfo['extension'];
					move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf);
				}
			}	
			
				
		}
		$data['result'] = $insert;
		$this->load->view('main', $data);
	}
	
	public function sterge_produs($id)
	{
		$q = "	SELECT * 
				FROM products
				WHERE  id = {$id}
				";
		$query = $this->db->query($q);
		
		if ($query->num_rows()) {
		
			$path = getcwd() . '/static/images/produse/' . $id . '/';
			if(is_dir($path)) {
				$this->load->helper('unlink');
				unlinkRecursive($path, $deleteRootToo = true);
			}
			$this->db->where('id', $id);
			$this->db->delete('products');
			
			echo 'Produsul a fost sters cu succes';
		} else {
			echo 'Produsul nu a fost gasit sau a fost sters deja';
		}
	}	
	
	
	public function editeaza_produs($id)
	{
	
		$this->load->model('admin_model', 'admin');
		$data['body_model'] 	= $this->admin;		
		$data['translations'] 	= $this->translations->get($page = 'main', $language = LANGUAGE);
		
		$data['pass_along']['function'] = __FUNCTION__;	
		$data['pass_along']['id'] 		= $id;	
	
		$this->load->view('main', $data);
	}	

	public function sterge_poza_produs($id, $poza)
	{
		$q = "	SELECT * 
				FROM products
				WHERE  id = {$id}
				";
		$query = $this->db->query($q);
		
		if ($query->num_rows()) {
		
			$path 		= getcwd() . '/static/images/produse/' . $id . '/' . $poza;
			$thumb_path = getcwd() . '/static/images/produse/' . $id . '/thumbnails/' . $poza;
			
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
	
	public function sterge_pdf_produs($id, $pdf)
	{
		$q = "	SELECT * 
				FROM products
				WHERE  id = {$id}
				";
		$query = $this->db->query($q);
		
		if ($query->num_rows()) {
		
			$pdf_path = getcwd() . '/static/images/produse/' . $id . '/pdf/' . $pdf;
			
			if(is_file($pdf_path)) {
				unlink($pdf_path);
				echo 'PDF-ul a fost sters cu success';
			} else {
				echo 'PDF-ul nu a fost gasit sau a fost sters deja';
			}
		} else {
				echo 'PDF-ul nu a fost gasit sau a fost sters deja';
		}
	}		
	


}
