<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produse_model extends CI_Model {

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
	
	function index($params = false)
	{
		$data['translations'] = $this->translations->get($page = 'produse', LANGUAGE);
		$this->load->view('produse', $data);
	}
	
	function lista($params = false)
	{
		$this->load->library('session');
		$data['authorized'] = $this->session->userdata('authorized');
	
		$data['categories'] 	= $this->config->item('categories');
		$data['translations'] 	= $this->translations->get($page = 'produse', LANGUAGE);
		
		$data['params'] 		= $params;
		
		$params['category']	= (int) $params['category'];
		
		$category 	= $params['category'];
		$breadcrumb[] = $category;
		
		$stop = 0;
		while (!$stop) {
			
			if ($data['categories'][$category]['parent'] != 0) {
				$breadcrumb[] = $data['categories'][$category]['parent'];
				$category = $data['categories'][$category]['parent'];
			} else {
				$stop = 1;
			}
		}
		
		$data['breadcrumb'] = array_reverse($breadcrumb);
		
		$breadcrumb_title = '';
		foreach ($data['breadcrumb'] as $val) { 
			$breadcrumb_title .=  $data['categories'][$val]['title_' . LANGUAGE] . ' - ';
		}		
		
		$GLOBALS['META_TITLE'] = $GLOBALS['META_DESCRIPTION'] = $GLOBALS['META_KEYWORDS'] = trim($breadcrumb_title, '- ');
		
		$per_page = 15;
		if($params['page'] < 1)
			$params['page'] = 1;


		// get number of items to determine the number of pages
		$this->db->select("count(id) as cnt")->from('products')->where('category', $params['category']);
		$query = $this->db->get();
		$result = $query->row_array();
		$total_item_count = $result['cnt'];
		
		$numar_de_pagini = ceil($total_item_count/$per_page);
		
		if($params['page'] > $numar_de_pagini)
			$params['page'] = $numar_de_pagini;
			
		$offset = $per_page * ($params['page'] - 1);
		
		if($total_item_count > 0) {
		
			$this->db->select("*")->from('products')->where('category', $params['category']);
			$this->db->order_by('position', 'desc');
			$this->db->order_by('id', 'asc');
			$this->db->limit($per_page, $offset);
			
			$query = $this->db->get();
			$result = $query->result_array();
			
			foreach ($result as &$val) {
				$path = getcwd() . "/static/images/produse/{$val['id']}/thumbnails/";
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

		
		foreach ($result as &$val) {
			$val['link'] = linkize($breadcrumb_title . $val['title_' . LANGUAGE]);
		}
		
		$data['products'] 			= $result;
		$data['page'] 				= $params['page'];
		$data['numar_de_pagini'] 	= $numar_de_pagini;
		$data['current_category']	= $params['category'];
		$data['offset']			 	= $offset;
		$data['per_page']			= $per_page;
		$data['total_item_count']	= $total_item_count;
		
		
		$this->load->view('produse_lista', $data);
	}
	
	function produs($params = false)
	{
		$data['translations'] = $this->translations->get($page = 'produse', LANGUAGE);
		$data['categories'] 	= $this->config->item('categories');

		$params['id'] = (int) $params['id'];
		
		$q = "	SELECT * 
				FROM products
				WHERE  id = {$params['id']}
				";
		$query = $this->db->query($q);
		$result = $query->row_array();
		
		$GLOBALS['META_TITLE'] = $GLOBALS['META_DESCRIPTION'] = $GLOBALS['META_KEYWORDS'] = $result['title_' . LANGUAGE];

		$category 	= $result['category'];
		$breadcrumb[] = $category;
		
		$stop = 0;
		while (!$stop) {
			
			if ($data['categories'][$category]['parent'] != 0) {
				$breadcrumb[] = $data['categories'][$category]['parent'];
				$category = $data['categories'][$category]['parent'];
			} else {
				$stop = 1;
			}
		}
		
		$data['breadcrumb'] = array_reverse($breadcrumb);		
		
		
		
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

		
		
		$data['product'] = $result;
		

		
		
		
		
		
		$this->load->view('produs', $data);
	}
	
	function cod($params = false)
	{
		$data['translations'] = $this->translations->get($page = 'produse', LANGUAGE);
		$data['categories'] 	= $this->config->item('categories');
				
		$code = $this->db->escape_str($this->input->get('query', true));
		
		$q = "	SELECT * 
				FROM products
				WHERE  code = '{$code}'
				";
		$query = $this->db->query($q);
		$result = false;
		if ($query->num_rows()) {
		
			$result = $query->row_array();
			
			$category 	= $result['category'];
			$breadcrumb[] = $category;
		
			$stop = 0;
			while (!$stop) {
			
				if ($data['categories'][$category]['parent'] != 0) {
					$breadcrumb[] = $data['categories'][$category]['parent'];
					$category = $data['categories'][$category]['parent'];
				} else {
					$stop = 1;
				}
			}
		
			$data['breadcrumb'] = array_reverse($breadcrumb);					
			
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
		}
		
		$data['product'] = $result;
		
		$this->load->view('produs', $data);
	}
	
	
	function nume($params = false)
	{
		$this->load->library('session');
		$data['authorized'] = $this->session->userdata('authorized');
	
		$data['categories'] 	= $this->config->item('categories');
		$data['translations'] 	= $this->translations->get($page = 'produse', LANGUAGE);
		
		$data['params'] 		= $params;
	
		$title = "title_" . LANGUAGE;
		
		$criteria = $this->db->escape_like_str(trim($this->input->get('query', true)));
		
		$result = array();
		
		if (strlen($criteria) > 2) {
		
	/*		SELECT * FROM products
			WHERE MATCH (title_ro) AGAINST ('mere');
	*/		
			$q = "	SELECT * 
					FROM products
					WHERE  {$title} LIKE '%{$criteria}%'
					LIMIT 10
					";
			$query = $this->db->query($q);
			
			$result = $query->result_array();
			
			foreach ($result as &$val) {
				$path = getcwd() . "/static/images/produse/{$val['id']}/thumbnails/";
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
			
			foreach ($result as &$val) {
				$val['link'] = linkize($val['title_' . LANGUAGE]);
			}
		}
		
		$data['criteria'] 			= $criteria;
		$data['products'] 			= $result;
		
		$this->load->view('cauta', $data);
	}
	
	
}
