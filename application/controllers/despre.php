<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Despre extends CI_Controller {

	public function index()
	{	
		$x = array(1,2,3,4,5,6,7,);

		echo json_encode($x);
		return;
	}
}