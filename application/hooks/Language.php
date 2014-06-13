<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language 
{

    public function setLanguage()
    {
		/* deal with language */
		$languages = array('ro', 'en');
		
		if (isset($_GET['change_language']) && in_array($_GET['change_language'], $languages)) {
			setcookie("language", $_GET['change_language'], time() + 2592000, '/');  /* expire in 30 days */			
			define('LANGUAGE', $_GET['change_language']);	
		} else {
		
			if (isset($_COOKIE['language'])) {
			
				if (in_array($_COOKIE['language'], $languages)) {		
					define('LANGUAGE', $_COOKIE['language']);	
				} else {
					setcookie("language", $languages[0], time() + 2592000, '/');  /* expire in 30 days */			
					define('LANGUAGE', $languages[0]);	
				}
			} else {
				setcookie("language", $languages[0], time() + 2592000, '/');  /* expire in 30 days */	
				define('LANGUAGE', $languages[0]);	
			}
		}
		/* end dealing with language */
    }
	
}
