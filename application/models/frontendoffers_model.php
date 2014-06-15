<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontendoffers_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function display($params)
    {
        if (isset($params['function']) && method_exists(__CLASS__, $params['function'])) {
            return $this->$params['function']($params);
        } else {
            $data       = array();

            $this->load->view('show_offers', $data);
        }
    }

    function show($params)
    {
        $data = array();
        $this->load->view('show_offers', $data);
    }


}