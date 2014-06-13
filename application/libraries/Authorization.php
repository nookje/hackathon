<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorization
{
    private $ci = null;
	private $login_email = 'catalin@robmet.ro';
	private $password = 'ea2e346423cdb1beae1b31f0cb2d1cea';
	
    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->library('session');
    }

	public function login($email, $password)
	{
		if ($email !== $this->login_email || $password !== $this->password ) {
			return false;
		}
		
		
		$result['authorized'] = true;
        $this->ci->session->set_userdata($result);	
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
}
