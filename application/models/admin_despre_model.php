<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_despre_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    
    function display($params = false)
    {
		$data = array();
		
		
		$path = getcwd() . "/static/images/despre/company/thumbnails/";
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
			$data['company'] = $gallery;
		}
		
		
		$path = getcwd() . "/static/images/despre/stocks/thumbnails/";
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
			$data['stocks'] = $gallery;
		}
		
		$this->load->view('admin_despre', $data);
    }

	
}
