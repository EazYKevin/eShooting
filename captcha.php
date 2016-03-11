<?php

	session_start(); 
	
	$md5 = md5(microtime() * mt_rand(1000,9999));
	
	$string = substr($md5,0,6);
	
	$captcha = imagecreatefrompng("img/captcha.png"); 
	
	$red = imagecolorallocate($captcha, 255, 0, 0);
	
	$black = imagecolorallocate($captcha, 0, 0, 0);
	
	$grey = imagecolorallocate($captcha, 128, 128, 128);
	
	$line = imagecolorallocate($captcha, 0, 0, 0); 
	
	//TEST
	
	for ($i = 0; $i < 60; $i++){ 
	
    imagesetthickness($captcha, rand(1, 3));
	
		imagearc(
		
			$captcha,
			
			rand(1, 300), // x-coordinate of the center.
			
			rand(1, 300), // y-coordinate of the center.
			
			rand(1, 300), // The arc width.
			
			rand(1, 300), // The arc height.
			
			rand(1, 300), // The arc start angle, in degrees.
			
			rand(1, 300), // The arc end angle, in degrees.
			
			(rand(0, 200) ? $black : $grey) // A color identifier.
			
		);
		
	}
	
	//TEST
	
	$rPos = mt_rand(-5,30);
	
	$font = 'font/coolvetica.ttf';

	//imagettftext($captcha, mt_rand(20,50), mt_rand(1,150), 46, 46, $grey, $font, $string);
	
	imagettftext($captcha, 20, $rPos, 46, 46, $grey, $font, $string);
	
	imagettftext($captcha, 20, $rPos, 45, 45, $black, $font, $string);
	
	$_SESSION['key'] = md5($string);
	
	header("Content-type: image/png"); 
	
	imagepng($captcha);
	
?>

