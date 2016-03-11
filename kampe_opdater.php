<?php

	$id = $_POST['id']; // fra det skjulte felt i formularen

	$dato = $_POST['dato'];

    $hold = $_POST['hold'];

    $modstander = $_POST['modstander'];

    $bedstudaf = $_POST['bedstudaf'];

    $resultat1 = $_POST['resultat1'];

    $resultat2 = $_POST['resultat2'];

    require_once 'include/incl_db.php';	

    $hold = addslashes($hold);

    $modstander = addslashes($modstander);

	$sql = "UPDATE es_kampe SET dato = '$dato', hold = '$hold', modstander = '$modstander', bo = '$bedstudaf', resultat1 = '$resultat1', resultat2 = '$resultat2' WHERE id = $id";
	
	$res = $objCon->query($sql);
	
	header('location:adminpanel.php?idtab=2');

?>