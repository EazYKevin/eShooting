<?php

    $dato = $_POST['dato'];

    $hold = $_POST['hold'];

    $modstander = $_POST['modstander'];

    $bedstudaf = $_POST['bedstudaf'];

    $resultat1 = $_POST['resultat1'];

    $resultat2 = $_POST['resultat2'];

    require_once 'include/incl_db.php';	

    $hold = addslashes($hold);

    $modstander = addslashes($modstander);

	if($dato != "" && $hold != "" && $modstander != "" && $bedstudaf != "" && $resultat1 != "" && $resultat2 != ""){
		
		$sql = "INSERT INTO es_kampe (dato, hold, modstander, bo, resultat1, resultat2) VALUES ('$dato','$hold','$modstander','$bedstudaf','$resultat1','$resultat2')";
		$res = $objCon->query($sql);
	}
	
	header('location:adminpanel.php?idtab=2');
	
?>

