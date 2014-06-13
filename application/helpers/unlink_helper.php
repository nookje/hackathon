<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * Recursively delete a directory 
 * 
 * @param string $dir Directory name 
 * @param boolean $deleteRootToo Delete specified top-level directory as well 
 */ 
function unlinkRecursive($dir, $deleteRootToo) { 
    
	if(!is_dir($dir))
		return;
	
	if(!$dh = @opendir($dir)) 
        return; 

    while (false !== ($obj = readdir($dh))) { 
        if($obj == '.' || $obj == '..') 
            continue; 

		if(is_dir($dir . '/' . $obj))
			unlinkRecursive($dir.'/'.$obj, true);
		else
			unlink($dir . '/' . $obj);
    } 

    closedir($dh); 
    
    if ($deleteRootToo) 
        @rmdir($dir); 
    
    return; 
} 
