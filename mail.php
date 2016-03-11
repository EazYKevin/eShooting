<?php

	$navn = $_POST['navn'];
	$email = $_POST['email'];
	$emne = $_POST['emne'];
	$besked = $_POST['besked'];
	$captcha = $_POST['captcha'];
	
	session_start();

?>

<?php
// multiple recipients
$to  = 'eazy.kevin@gmail.com';

// subject
$subject = 'Kontakt Os Mail';

// message
$message = '
<!doctype html>
<html>
<body>

	<img src="http://exaztgaming.clanservers.com/img/mailtop.png" alt="Kontakt Os Mail" />
	
	<br />
	<br />
    
	<table rules="all" style="border-color: #666;" cellpadding="10">
    
		<tr style="background: #eee;">
        
        	<td>
            
            	<strong>Navn & Efternavn:</strong> 
            
        	</td>
            
            <td style="width490px; height:auto;">
			
			
				' . $navn . '
            
            </td>
            
        </tr>
        
		<tr>
        
        	<td>
            
            	<strong>E-mail:</strong>
                
            </td>
            
            <td style="width:490px; height:auto;">
			
				' . $email . '
            
            </td>
            
		</tr>
        
        <tr>
        
        	<td>
            
            	<strong>Emne:</strong>
                
            </td>
            
            <td style="width:490px; height:auto;">
			
				' . $emne . '
            
            </td>
            
		</tr>
        
        <tr>
        
        	<td>
            
            	<strong>Besked:</strong>
                
            </td>
            
            <td style="width:490px; height:auto;">
			
				' . $besked . '
            
            </td>
            
		</tr>
               
</table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: <ExaztGaming.dk>' . "\r\n";

$errors = array();

if (strlen($navn) < 2)
{
    $errors[] = "Navn for kort.";
}

if (strlen($navn) > 60) 
{
    $errors[] = "Navn for langt.";
}

if(str_word_count($navn) < 2)
{
    $errors[] = "Skriv dit fulde navn";
}
    
// Valider email

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) 
{
        $errors[] = "E-mail'en var ugyldig.";
}

// Valider Emne

if (strlen($emne) < 4)
{
    $errors[] = "Emne for kort.";
}

// Valider Besked

if (strlen($besked) < 10)
{
    $errors[] = "Beskeden er ugyldig eller for kort.";
}

// Valider Captcha
 
if(md5($_POST['captcha']) != $_SESSION['key']){
	
	$errors[] = "Captcha var ugyldig.";	

}

if (sizeof($errors) > 0) {
	  
	$_SESSION["kontaktbeskedfejl"] = $errors;
    
    $_SESSION["kontaktformmsg"] = array(
				"navn" => $navn,
				"email" => $email,
				"emne" => $emne,
                "besked" => $besked);
	
	header("location:kontakt.php");

}

else {
		
	mail($to, $subject, $message, $headers);
	
	unset($_SESSION["kontaktformmsg"]);
	
	$_SESSION["kontaktbeskedsendt"] = "Beskeden er blevet sendt!";
	
	header("location:kontakt.php");

}

?>