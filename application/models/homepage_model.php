<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Homepage_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
    
    public function display()
    {
		$data['translations'] = $this->translations->get($page = 'homepage', $language = LANGUAGE);
		$this->load->view('homepage', $data);
    }
	
}
