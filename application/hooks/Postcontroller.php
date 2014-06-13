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
	    	$replace = "<title>Robineti industriali, armaturi. Distribuitor hidranti subterani, armaturi industriale, robineti Bolder Valve</title>
                    <meta name=\"title\" content=\"Robineti industriali, armaturi. Distribuitor hidranti subterani, armaturi industriale, robineti Bolder Valve\" />                                 
                    <meta name=\"description\" content=\"Robineti industriali, armaturi. Distribuitor hidranti subterani, armaturi industriale, robineti Bolder Valve\" />
         			";        
        }
        
        $html = preg_replace('/<title>Robmet<\/title>/', $replace, $html, 1);
    }    
	
}
