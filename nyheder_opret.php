<?php


    $title = $_POST['title'];

    $tekst = $_POST['tekst'];

    $dato = date("Y-m-d");

    require_once 'include/incl_db.php';	

    $title = addslashes($title);

    $tekst = addslashes($tekst);

	if($title != "" && $tekst != ""){
		
		$sql = "INSERT INTO es_nyheder (title, tekst, dato) VALUES ('$title','$tekst','$dato')";
		$res = $objCon->query($sql);
	}
	
	header('location:adminpanel.php?idtab=1');
	
?>

