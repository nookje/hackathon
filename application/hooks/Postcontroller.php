<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postcontroller 
{
    public function execute()
    {
        $ci = & get_instance();
        $html = $ci->output->get_output();
		
		$this->title(&$html);
		
		echo $html;

    }
    
    public function title(&$html) 
    {    
	
        if (isset($GLOBALS['META_TITLE'])) {
		
			$GLOBALS['META_KEYWORDS'] = meta_keywordize($GLOBALS['META_KEYWORDS']);
    		$replace = 
			"
				<title>{$GLOBALS['META_TITLE']}</title>
				<meta name=\"title\" content=\"{$GLOBALS['META_TITLE']}\" />                                 
				<meta name=\"description\" content=\"" . substr($GLOBALS['META_DESCRIPTION'], 0, 150) . "\" />
				<meta name=\"keywords\" content=\"" . $GLOBALS['META_KEYWORDS'] . "\" />
			";
        } else {
        	if (LANGUAGE == 'ro') {
		    	$replace = "<title>Robmet - robineti,robinete,vane,armaturi,hidranti,actionari,supape</title>
	                    <meta name=\"title\" content=\"Robmet - robineti,robinete,vane,armaturi,hidranti,actionari,supape\" />                                 
	                    <meta name=\"description\" content=\"Robmet - robineti,robinete,vane,armaturi,hidranti,actionari,supape\" />
	         			";     
         	} else {
		    	$replace = "<title>Robmet - industrial valves,hydrants,actuators,water and steam equipment</title>
	                    <meta name=\"title\" content=\"Robmet - industrial valves,hydrants,actuators,water and steam equipment\" />                                 
	                    <meta name=\"description\" content=\"Robmet - industrial valves,hydrants,actuators,water and steam equipment\" />
	         			";              	
         	}   
        }
        
        $html = preg_replace('/<title>Robmet<\/title>/', $replace, $html, 1);
    }    
	
}