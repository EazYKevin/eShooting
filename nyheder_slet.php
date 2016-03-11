<?php

	$id = $_GET['idnyhedslet'];

	require_once 'include/incl_db.php';	

	$sql = "DELETE FROM es_nyheder WHERE id = '$id'";
	
	$res = $objCon->query($sql);
	
	header('location:adminpanel.php?idtab=1');
	
?>

