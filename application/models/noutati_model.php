<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noutati_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    
    function display($params)
    {
		if (isset($params['function']) && method_exists(__CLASS__, $params['function'])) {
			return $this->$params['function']($params);
		}
    }
	
	
	function lista($params = false)
	{
		$this->load->library('session');
		$data['authorized'] = $this->session->userdata('authorized');
	
		$data['categories'] 	= $this->config->item('categories');
		$data['translations'] 	= $this->translations->get($page = 'noutati', LANGUAGE);
		
		$data['params'] 		= $params;
		
		
		$per_page = 5;
		if($params['page'] < 1)
			$params['page'] = 1;


		// get number of items to determine the number of pages
		$this->db->select("count(id) as cnt")->from('news');
		$query = $this->db->get();
		$result = $query->row_array();
		$total_item_count = $result['cnt'];
		
		$numar_de_pagini = ceil($total_item_count/$per_page);
		
		if($params['page'] > $numar_de_pagini)
			$params['page'] = $numar_de_pagini;
			
		$offset = $per_page * ($params['page'] - 1);

		if($total_item_count > 0) {
		
			$this->db->select("*")->from('news');
			$this->db->order_by('position', 'desc');
			$this->db->order_by('id', 'desc');
			$this->db->limit($per_page, $offset);
			
			$query = $this->db->get();
			$result = $query->result_array();
			
			foreach ($result as &$val) {
				$path = getcwd() . "/static/images/noutati/{$val['id']}/poster/";
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
					$val['poster'] = array_pop($gallery);
				}

				$path = getcwd() . "/static/images/noutati/{$val['id']}/thumbnails/";
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
					$val['avatar'] = array_pop($gallery);
				}

			}
		} else {
			$result = array();
		}

		
		$data['noutati'] 			= $result;
		$data['page'] 				= $params['page'];
		$data['numar_de_pagini'] 	= $numar_de_pagini;
		$data['offset']			 	= $offset;
		$data['per_page']			= $per_page;
		$data['total_item_count']	= $total_item_count;
		
		
		$this->load->view('noutati', $data);
	}
	
	function vezi($params = false)
	{
		$data['translations'] = $this->translations->get($page = 'noutati', LANGUAGE);

		$params['id'] = (int) $params['id'];
		
		$q = "	SELECT * 
				FROM news
				WHERE  id = {$params['id']}
				";
		$query = $this->db->query($q);
		
		if (!$query->num_rows()) {
			custom_redirect('noutati/lista');
		}
		
		$result = $query->row_array();
		
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

		
		
		$data['noutate'] = $result;
		
		$this->load->view('noutate', $data);
	}
	
}
