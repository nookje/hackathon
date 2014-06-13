<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produse extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
	}

	public function index()
	{	
		$data['translations'] 	= $this->translations->get($page = 'main', LANGUAGE);
		
		if ($data['translations'][42] != $this->uri->segment(1) && LANGUAGE == 'ro') {
			custom_redirect($data['translations'][42]);
		} elseif ($data['translations'][42] != $this->uri->segment(1) && LANGUAGE == 'en') {
			custom_redirect($data['translations'][42]);
		}

		$this->load->model('produse_model', 'produse');		
		
		$data['body_model'] 	= $this->produse;		
		$data['title'] 			= $this->translations->get($page = 'produse_title', LANGUAGE);
		$data['categories'] 	= $this->config->item('categories');
		$data['pass_along']['function'] = __FUNCTION__;	
			
		$this->load->view('main', $data);
	}
	
	
	public function lista($category, $page = 1)
	{		

		$category 	= (int) $category;
		$page 		= (int) $page;
		
		$data['categories'] 	= $this->config->item('categories');

		if (isset($data['categories'][$category]) && $this->uri->segment(1) != $data['categories'][$category]['link_' . LANGUAGE]) {
			$redirect_to_page = ($page > 1) ? "/{$page}" : "";
			custom_redirect($data['categories'][$category]['link_' . LANGUAGE] . $redirect_to_page);
		} 	
		
		if (!isset($data['categories'][$category])) {
			custom_redirect('produse');
		}

		$this->load->model('produse_model', 'produse');	
			
		$data['body_model'] 	= $this->produse;				
		$data['translations'] 	= $this->translations->get($section = 'main', LANGUAGE);

				
		$data['pass_along']['function'] = __FUNCTION__;	
		$data['pass_along']['category'] = $category;	
		$data['pass_along']['page'] 	= $page;	
		
		$this->load->view('main', $data);
	}
	
	
	public function produs($id)
	{	
		$id = (int) $id;
		
		$data['categories'] 	= $this->config->item('categories');
		$this->load->model('produse_model', 'produse');	
			
		$data['body_model'] 	= $this->produse;				
		$data['translations'] 	= $this->translations->get($section = 'main', LANGUAGE);
		$data['title'] 			= $this->translations->get($section = 'produse_title', LANGUAGE);
				
		$data['pass_along']['function'] = __FUNCTION__;	
		$data['pass_along']['id'] 		= $id;	
		
		$q = "	SELECT * 
				FROM products
				WHERE  id = {$id}
				";
		$query = $this->db->query($q);
		if (!$query->num_rows()) {
			custom_redirect('produse');
		}
		$result = $query->row_array();
		
		$uri = str_replace("{$id}-", "", $this->uri->segment(1));

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
		
		$breadcrumb_title = '';
		foreach ($data['breadcrumb'] as $val) { 
			$breadcrumb_title .=  $data['categories'][$val]['title_' . LANGUAGE] . '-';
		}		
		
		$URL = linkize($breadcrumb_title . "-" . $result['title_' . LANGUAGE]);

		if ($URL != $uri) {
			custom_redirect("{$id}-{$URL}");
		}

		
		$this->load->view('main', $data);
	}		
}
