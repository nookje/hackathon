<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends CI_Controller {

    public function index()
    {
        $this->load->model('frontendrequests_model', 'frontendrequests');
        $data['body_model']     = $this->frontendrequests;
        $data['pass_along']['function'] = __FUNCTION__;

        $this->load->view('main', $data);
    }


    public function view($id)
    {
        $this->load->model('frontendrequests_model', 'frontendrequests');
        $data['body_model']     = $this->frontendrequests;
        $data['pass_along']['function'] = __FUNCTION__;
        $data['pass_along']['id'] = $id;

        $this->load->view('main', $data);
    }    


    public function add()
    {
        $this->load->model('frontendrequests_model', 'frontendrequests');
        $data['body_model']     = $this->frontendrequests;
        $data['pass_along']['function'] = __FUNCTION__;

        $this->load->view('main', $data);
    } 
}