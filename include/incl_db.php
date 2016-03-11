<?php

	$objCon = new mysqli("localhost", "root", "", "eshooting");
	
	date_default_timezone_set('Europe/Copenhagen');
	
	// Tester Forbindelse 
	
	if($objCon->connect_error) {
		
		die('kan ikke forbinde (' . $objCon->connect_errno . ')'. $objCon->connect_error); 
		
	}
	
	$objCon->set_charset('utf8');

?>