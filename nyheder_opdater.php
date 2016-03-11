<?php

	$id = $_POST['id']; // fra det skjulte felt i formularen

	$title = $_POST['title'];

    $tekst = $_POST['tekst'];
	
	require_once 'include/incl_db.php';	
	
    $title = addslashes($title);

    $tekst = addslashes($tekst);

	$sql = "UPDATE es_nyheder SET title = '$title', tekst = '$tekst' WHERE id = $id";
	
	$res = $objCon->query($sql);
	
	header('location:adminpanel.php?idtab=1');

?>