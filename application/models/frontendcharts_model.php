<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontendcharts_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function display($params)
    {
        if (isset($params['function']) && method_exists(__CLASS__, $params['function'])) {
            return $this->$params['function']($params);
        }
    }


    function top($params = false)
    {
        $this->load->model('users_model', 'users');

        $data['top'] = $this->users->getTopUsers();
        $data['max'] = $data['top']['0']['total'];

        $data['type'] = 'user';

        $this->load->view('charts', $data);
    }

    function top_locations($params = false)
    {
        $this->load->model('users_model', 'users');

        $data['top'] = $this->users->getTopLocations();
        $data['max'] = $data['top']['0']['total'];

        $data['type'] = 'location';

        $this->load->view('charts', $data);
    }

    function total_per_month($params = false)
    {
        $this->load->model('users_model', 'users');

        $data['top'] = $this->users->getTotalPerMonth();
        $data['max'] = $data['top']['0']['total'];

        $data['type'] = 'month';

        foreach ($data['top'] as $val) {
            if ($data['max'] < $val['total']) {
                $data['max'] = $val['total'];
            }
        }

        $this->load->view('charts', $data);
    }


}