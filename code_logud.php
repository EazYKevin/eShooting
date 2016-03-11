<?php
    // Logud Script
	session_start();
	session_destroy();
	header('location:index.php');
?>