<?php
 
	function make_thumb($img_name ,$filename, $new_w, $new_h, $compensate = 'none') { 
		//get image extension.
		$ext = getExtension($img_name);
		
		//creates the new image using the appropriate function from gd library
		if(!strcmp("jpg",$ext) || !strcmp("jpeg",$ext)) {

			@$src_img=imagecreatefromjpeg($img_name);
			if ($src_img === false) {
				$src_img=imagecreatefrompng($img_name);
			}
		}
		
		if(!strcmp("png",$ext)) {
			$src_img=imagecreatefrompng($img_name);
			if ($src_img === false) {
				$src_img=imagecreatefromjpeg($img_name);
			}
		}
		
		//gets the dimmensions of the image
		$old_x = imageSX($src_img);
		$old_y = imageSY($src_img);
	
		// next we will calculate the new dimmensions for the thumbnail image
		$ratio1=$old_x/$new_w;
		$ratio2=$old_y/$new_h;
		if($ratio1>$ratio2)	{
			$thumb_w=$new_w;
			$thumb_h=$old_y/$ratio1;
		} else {
			$thumb_h=$new_h;
			$thumb_w=$old_x/$ratio2;
		}
		
		
		$diff_x = 0;
		$diff_y = 0;
		
		// daca se vrea dimensiune fixa fara filling de background atunci cropuim
		if($compensate == 'crop') {
		
			$ratio1=$new_w/$old_x;
			$ratio2=$new_h/$old_y;
			
			if ($old_x > $old_y ) {//landscape
				$crop_w = round($old_x * $ratio2);
				$crop_h = $new_h;
				//$src_x = ceil( ( $old_x - $old_y ) / 2 );
				$src_x = ceil( ( $old_x - $old_y ) / 2 );
				$src_y = 0;
				
			} elseif ($old_x < $old_y ) {//portrait
				$crop_h = round($old_y * $ratio1);
				$crop_w = $new_w;
				$src_x = 0;
				//$src_y = ceil( ( $old_y - $old_x ) / 2 );
				$src_y = 0;
			} else {//square
				$crop_w = $new_w;
				$crop_h = $new_h;
				$src_x = 0;
				$src_y = 0;
			}
		
		
		//var_dump($src_x);
		
			// we create a new image with the new dimmensions
			$dst_img = ImageCreateTrueColor($new_w, $new_h);
		
			imagecopyresampled(
			  $dst_img, $src_img,        // destination, source
			  0, 0, $src_x, $src_y,    	// dstX, dstY, srcX, srcY
			  $crop_w, $crop_h,       	// dstW, dstH
			  $old_x, $old_y);    		// srcW, srcH
		// daca se vrea filling de background
		} elseif($compensate == 'fill') {

			// we create a new image with the new dimmensions
			$dst_img = ImageCreateTrueColor($new_w, $new_h);
		
			$white = imagecolorallocate($dst_img, 255, 255, 255);
			imagefilledrectangle($dst_img, 0, 0, $new_w, $new_h, $white);
			imagepalettecopy($dst_img, $src_img);
			
			if($thumb_w > $thumb_h) {
				$diff_y = ($new_h - $thumb_h ) / 2;	
			} else  {
				$diff_x = ($new_w - $thumb_w ) / 2;	
			}
			
			imagecopyresampled(
			  $dst_img, $src_img,        // destination, source
			  $diff_x, $diff_y, 0, 0,    // dstX, dstY, srcX, srcY
			  $thumb_w, $thumb_h,       // dstW, dstH
			  $old_x, $old_y);    		// srcW, srcH


		} elseif($compensate == 'none') {
			// we create a new image with the new dimmensions
			$dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);
			imagecopyresampled(
			  $dst_img, $src_img,        // destination, source
			  0, 0, 0, 0,    			// dstX, dstY, srcX, srcY
			  $thumb_w, $thumb_h,       // dstW, dstH
			  $old_x, $old_y);    		// srcW, srcH
		}
		
 
		
		// output the created image to the file. Now we will have the thumbnail into the file named by $filename
		if(!strcmp("png", $ext))
			imagepng($dst_img, $filename); 
		else
			imagejpeg($dst_img, $filename, 92); # 92/100 quality parameter
		
		//destroys source and destination images. 
		imagedestroy($dst_img); 
		imagedestroy($src_img); 
	}
	
	// This function reads the extension of the file. 
	// It is used to determine if the file is an image by checking the extension. 
	function getExtension($str) {
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}