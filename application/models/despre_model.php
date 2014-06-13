<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Despre_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    
    
    function display()
    {
		$data['translations'] = $this->translations->get($page = 'despre', $language = LANGUAGE);
		
		
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
			$data['company_gallery_count'] = count($gallery);
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
			$data['stocks_gallery_count'] = count($gallery);			
		}
		
		
		$this->load->view('despre', $data);
    }
}