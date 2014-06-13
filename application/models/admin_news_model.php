<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_news_model extends CI_Model {

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
		
		$this->load->view('admin_news', $data);
    }

    function editeaza_noutate($params)
    {
		$q = "	SELECT * 
				FROM news
				WHERE  id = {$params['id']}
				";
		$query = $this->db->query($q);
		if (!$query->num_rows()) {
			custom_redirect('noutati');
		}
		
		$result = $query->row_array();

		if (count($_POST)) {
			$result['title_ro'] 	= $this->input->post('title_ro', true);
			$result['title_en'] 	= $this->input->post('title_en', true);
			
			$result['description_ro'] 	= $this->input->post('description_ro', true);
			$result['description_en'] 	= $this->input->post('description_en', true);
			
			$result['position'] 	= $this->input->post('position', true);
			$result['period'] 		= $this->input->post('period', true);
						
			$this->db->where('id', $params['id']);
			$this->db->update('news', $result);
		}
		
		if(isset($_FILES['poza']['tmp_name']) && $_FILES['poza']['tmp_name']) {
			$upload_path = getcwd() . '/static/images/noutati/' . $params['id'] . '/';
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
			$upload_path = getcwd() . '/static/images/noutati/' . $params['id'] . '/';
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

		$path = getcwd() . "/static/images/noutati/{$result['id']}/thumbnails/";
		$gallery = '';
		if ($handle = @opendir($path)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					$gallery[filemtime($path . $file) . '_'.  md5($file)] = $file;
				}
			}
			closedir($handle);

		}
		
		if (is_array($gallery)) {
			$result['gallery'] = $gallery;
		}
		
		
		$path = getcwd() . "/static/images/noutati/{$result['id']}/poster/";
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
			$result['poster'] = array_pop($gallery);
		}		
	

		$data['result'] 		= $result;
		$data['categories'] 	= $this->config->item('categories');
		
		$this->load->view('noutate_editeaza', $data);
    }



	
}
