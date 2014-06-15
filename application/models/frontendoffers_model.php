<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontendoffers_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function display()
    {
        $data       = array();
        $this->load->view('offers', $data);
    }

    function show($params)
    {

        $this->load->view('show_offers', $data);
    }


}