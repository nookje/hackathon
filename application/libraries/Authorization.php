<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorization
{
    private $ci = null;
	private $password = 'hackathon';

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->library('session');
    }

	public function login($email, $role, $password)
	{
		if (!$email || !$role || $password !== $this->password) {
			return false;
		}
		
		$result['authorized'] = true;
		$result['email'] = $email;
		$result['role'] = $role;
        $this->ci->session->set_userdata($result);	

        return $result;
	}

	public function logout()
	{
		$this->ci->session->sess_destroy();	
	}
	
	public function session_item($key)
	{
		return $this->ci->session->userdata($key);	
	}
	
	public function set_session_item($key, $value)
	{
		return $this->ci->session->set_userdata($key, $value);	
	}

	public function get_all_session_items()
	{
		return array('authorized' => $this->session_item('authorized'),
					'email' => $this->session_item('email'),
					'role' => $this->session_item('role'),
		);
	}
}
