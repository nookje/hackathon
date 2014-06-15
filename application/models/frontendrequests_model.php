<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontendrequests_model extends CI_Model {

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

			$this->load->model('requests_model', 'requests');		
			$requests = $this->requests->loadRequests();

            $data['requests'] = $requests;

            $data['count'] = count($this->requests->newRequests());


            $this->load->view('requests', $data);
        }
    }


    function view($params)
    {
		$this->load->model('requests_model', 'requests');		
		$request = $this->requests->get($params['id']);

    	$data = array();
    	$data['request'] = $request;

        $this->load->model('offers_model', 'offers');       
        $offers = $this->offers->getOffersByRequestId($params['id']);

        $data['offers'] = $offers;

        $this->load->view('view_request', $data);
    }

    function add($params)
    {

        $this->load->view('add_request');
    }

}