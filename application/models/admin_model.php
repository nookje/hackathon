<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    
    function display($params = false)
    {
		if (isset($params) && isset($params['function']) && method_exists(__CLASS__, $params['function'])) {
			return $this->$params['function']($params);
		} else {
			return $this->index($params);
		}
    }

    function index($params)
    {
				
		$data['categories'] 	= $this->config->item('categories');
		
		$this->load->view('admin', $data);
    }

    function editeaza_produs($params)
    {
		$q = "	SELECT * 
				FROM products
				WHERE  id = {$params['id']}
				";
		$query = $this->db->query($q);
		if (!$query->num_rows()) {
			custom_redirect('produse');
		}
		
		$result = $query->row_array();

		if (count($_POST)) {
			$result['title_ro'] 	= $this->input->post('title_ro', true);
			$result['title_en'] 	= $this->input->post('title_en', true);
			
			$result['description_ro'] 	= $this->input->post('description_ro', true);
			$result['description_en'] 	= $this->input->post('description_en', true);
			
			$result['code'] 		= $this->input->post('code', true);
			$result['category'] 	= $this->input->post('category', true);
			
			$result['position'] 	= $this->input->post('position', true);
			
			$this->db->where('id', $params['id']);
			$this->db->update('products', $result);
		}
		
		if(isset($_FILES['poza']['tmp_name']) && $_FILES['poza']['tmp_name']) {
			$upload_path = getcwd() . '/static/images/produse/' . $params['id'] . '/';
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
			$upload_path = getcwd() . '/static/images/produse/' . $params['id'] . '/';
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

		$path = getcwd() . "/static/images/produse/{$result['id']}/thumbnails/";
		$gallery = '';
		if ($handle = @opendir($path)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					$gallery[filemtime($path . $file) . '_'.  md5($file)] = $file;
				}
			}
			closedir($handle);
		}

		if(is_array($gallery)) {
			krsort($gallery);
			$result['avatar'] = array_pop($gallery);
		}
		
		
		$path = getcwd() . "/static/images/produse/{$result['id']}/pdf/";
		$gallery = '';
		if ($handle = @opendir($path)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					$gallery[filemtime($path . $file) . '_'.  md5($file)] = $file;
				}
			}
			closedir($handle);
		}

		if(is_array($gallery)) {
			krsort($gallery);
			$result['pdf'] = array_pop($gallery);
		}		
	

		$data['result'] 		= $result;
		$data['categories'] 	= $this->config->item('categories');
		
		$this->load->view('produs_editeaza', $data);
    }



	
}
