<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends CI_Controller
{
    
    function __construct()
    {
		parent::__construct();
    }
    
   
    function image($type, $dummy = '')
    {
		header("Content-type: image/png");

		// FUNDALUL 
		$image = imagecreatefrompng(getcwd().'/static/images/captcha/captcha_bg.png');
		
		// TEXTUL
		$colourtext = ImageColorAllocate($image, 61, 61, 61);
		$font = imageloadfont(getcwd().'/static/images/captcha/formata.gdf');
		
		$total_string = '';
		for($i = 0; $i < 5; $i++)
		{
			$rand = rand(1,9);
			$total_string .= $rand;
			$rand_y = rand(1,15);
			imagestring($image, $font, $i*22+22 ,$rand_y , $rand, $colourtext);
		}
		
		$this->load->library("session");
		$this->session->set_userdata($type . '_captcha', $total_string);
		
		imagepng($image);
		imagedestroy ($image);
		return;
    }
	
}
