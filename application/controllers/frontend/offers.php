<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends CI_Controller {

    public function index()
    {
        $this->load->model('frontendoffers_model', 'frontendoffers');
        $data['body_model']     = $this->frontendoffers;
        $data['pass_along']['function'] = __FUNCTION__;

        $this->load->view('main', $data);
    }


    public function show(hash)
    {
        $this->load->model('frontendoffers_model', 'frontendoffers');
        $data['body_model']     = $this->frontendoffers;
        $data['pass_along']['function'] = __FUNCTION__;
        $data['pass_along']['id'] = $id;

        $this->load->view('main', $data);
    }

}