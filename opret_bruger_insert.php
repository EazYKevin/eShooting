<?php

require_once 'include/incl_db.php';

$brugernavn = $_POST['brugernavn'];
$email = $_POST['email'];
$kodeord = $_POST['kodeord'];
$kodeordconfirm = $_POST['kodeordconfirm'];
$captcha = $_POST['captcha'];
$medlemsiden = date("Y-m-d");

session_start();

$errors = array();

// Valider Brugernavn

if(strlen($brugernavn) < 2)
{
    $errors[] = "Brugernavn for kort.";
}

if(strlen($brugernavn) > 60) 
{
    $errors[] = "Brugernavn for langt.";
}

$sql = "SELECT brugernavn FROM es_medlemmer WHERE brugernavn='$brugernavn'";
$res = $objCon->query($sql);
$brugere = $res->num_rows;

if ($brugere != 0)
{
    $errors[] = "Brugernavn allerede i brug.";
}

// Valider Kodeord

if(strlen($kodeord) < 6)
{
    $errors[] = "Kodeord for kort.";
}

if(strlen($kodeord) > 30) 
{
    $errors[] = "Kodeord for langt.";
}

if(strlen($kodeord) > 30) 
{
    $errors[] = "Kodeord for langt.";
}

if($kodeord != $kodeordconfirm){
    $errors[] = "Kodeord matchede ikke.";
}

// Valider E-mail

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) 
{
        $errors[] = "E-mail'en var ugyldig.";
}

$sql = "SELECT email FROM es_medlemmer WHERE email='$email'";
$res = $objCon->query($sql);
$emails = $res->num_rows;

if ($emails != 0)
{
    $errors[] = "E-mail allerede i brug.";
}

// Valider Captcha
 
if(md5($_POST['captcha']) != $_SESSION['key']){
	
	$errors[] = "Captcha var ugyldig.";	

}

if (sizeof($errors) > 0) {
	  
	$_SESSION["opretbrugerfejl"] = $errors;
		
	$_SESSION["opretbrugermsg"] = array(
				"brugernavn" => $brugernavn,
				"email" => $email);
	
	header("location:opret_bruger.php");

}

else {
	
	unset($_SESSION["opretbrugermsg"]);
    
    $brugernavn = strtolower($brugernavn);
    $email = strtolower($email);
    $kodeord = strtolower($kodeord);
    $kodeord = md5($kodeord);
    
    if($brugernavn != "" && $email != "" && $kodeord != "" && $kodeordconfirm != "" && $medlemsiden != ""){
		
		$sql = "INSERT INTO es_medlemmer (brugernavn, email, kodeord, siden) VALUES ('$brugernavn','$email','$kodeord','$medlemsiden')";
		$res = $objCon->query($sql);
	}
	
	$_SESSION["opretbrugermsgopretet"] = "Tilykke din bruger er nu oprettet, du kan nu logge ind!";
	
	header("location:opret_bruger.php");

}

?>