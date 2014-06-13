<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    
    function display()
    {
		$data['translations'] = $this->translations->get($page = 'contact', $language = LANGUAGE);
		$this->load->view('contact', $data);
    }
}
