<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends CI_Controller {

    public function index()
    {
        $this->load->model('frontendrequests_model', 'frontendrequests');
        $data['body_model']     = $this->frontendrequests;
        $data['pass_along']['function'] = __FUNCTION__;

        $this->load->view('main', $data);
    }

}