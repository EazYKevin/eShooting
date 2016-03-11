<?php

	$id = $_GET['idkampeslet'];

	require_once 'include/incl_db.php';	

	$sql = "DELETE FROM es_kampe WHERE id = '$id'";
	
	$res = $objCon->query($sql);
	
	header('location:adminpanel.php?idtab=2');
	
?>

