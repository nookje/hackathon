<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    
    function display()
    {
		$data['translations'] = $this->translations->get($page = 'download', $language = LANGUAGE);
		
		$data['categories'] 	= $this->config->item('categories');
		
		$this->load->view('download', $data);
    }
}