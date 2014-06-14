<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontendrequests_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function display()
    {
        $data       = array();
        $this->load->view('requests', $data);
    }


}