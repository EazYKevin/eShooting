<?php
    
    require_once 'include/incl_db.php';

	$email = $_POST['email'];
    $email = strtolower($email);

    $sql = "SELECT * FROM es_medlemmer WHERE email='$email'";
    $res = $objCon->query($sql);
    while ($row = $res-> fetch_array()) {
        $id = $row['id'];
        $brugernavn = $row['brugernavn'];
        $kodeord = $row['kodeord'];
        $kodeorddekrypteret = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $kodeord ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $kodeord ) ) ), "\0");
    }
	
	session_start();

?>

<?php
// multiple recipients
$to  = 'eazy.kevin@gmail.com';

// subject
$subject = 'eShooting.dk - Glemt Kodeord!';

// message
$message = '
<!doctype html>
<html>
<body>
<table style="border-collapse: collapse; width: 600px;">
    <tr style="height: 180px;width: 600px;float: left; padding-top: 20px;background-image: url(http://eshooting.dk/img/bg.png); border-top-left-radius: 10px;border-top-right-radius: 10px;">
        <td style="width: 235px;"><a href="http://eshooting.dk/"><img src="http://eshooting.dk/img/logo.png" width="200" alt="Logo"></a></td>
        <td style="color: #fff; font-size:50px; font-family:fantasy; text-align:left;">Glemt kodeord?</td>
    </tr>
    <tr style="height: 450px;width: 588px;float: left; padding-left: 10px; font-family: Arial; text-align:left; font-size: 20px; font-weight: bold; background-color: #f9f9f9; border: 1px solid #ccc;">
        <td style="width:598px; height: 20px; float:left; margin-top: 20px; margin-bottom: 30px; font-size: 30px;">Hej EazY.</td>
        <td style="width:598px; height: 20px; float:left; margin-bottom: 25px;font-size: 25px;">Her er dine login informationer</td>
        <td style="width:598px; height: 20px; float:left; margin-bottom: 5px;">Brugernavn: '. $brugernavn .'</td>
        <td style="width:598px; height: 20px; float:left; margin-bottom: 20px;">Kodeord: '. $kodeorddekrypteret .'</td>
        <td style="width:598px; height: 20px; float:left; margin-bottom: 5px;">Venlig Hilsen / Best Regards</td>
        <td style="width:598px; height: 20px; float:left; margin-bottom: 20px;">eShooting.dk Staff / Management</td>
        <td style="height: 20px; float:left; margin-bottom: 5px;">Web:</td>
        <td><a style="width: 128px; height: 20px; float:left; margin-bottom: 5px; margin-right: 407px; text-decoration: none; color: #9d0000;" href="http://eshooting.dk/">eShooting.dk</a></td>
        <td style="height: 20px; float:left; margin-bottom: 5px;">Facebook:</td>
        <td><a style="width: 228px; height: 20px; float:left; margin-bottom: 5px;margin-right: 255px; text-decoration: none; color: #9d0000;" href="https://www.facebook.com/eShooting.dk">eShooting.dk Facebook</a></td>
        <td style="height: 20px; float:left; margin-bottom: 5px;">Twitter:</td>
        <td><a style="width: 198px; height: 20px; float:left; margin-bottom: 5px;margin-right: 313px; text-decoration: none; color: #9d0000;" href="https://twitter.com/eshootingdk">eShooting.dk Twitter</a></td>
        <td style="height: 20px; float:left; margin-bottom: 5px;">Youtube:</td>
        <td><a style="width: 213px; height: 20px; float:left; margin-bottom: 5px;margin-right: 284px; text-decoration: none; color: #9d0000;" href="https://www.youtube.com/user/eShootingdk">eShooting.dk Youtube</a></td>
        <td style="height: 20px; float:left; margin-bottom: 5px;">Steam:</td>
        <td><a style="width: 243px; height: 20px; float:left; margin-bottom: 5px;margin-right: 274px; text-decoration: none; color: #9d0000;" href="http://steamcommunity.com/groups/eShootingdk">eShooting.dk Community</a></td>
        <td style="height: 20px; float:left; margin-bottom: 5px;">Kontakt:</td>
        <td><a style="width: 108px; height: 20px; float:left; margin-bottom: 5px;margin-right: 394px; text-decoration: none; color: #9d0000;" href="http://eshooting.dk/kontakt.php">Kontakt Os</a></td>
    </tr>
    <tr style="height: 65px;width: 560px;float: left; padding-top: 10px;background-image: url(http://eshooting.dk/img/bg.png); padding: 20px; border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
        <td style="color: #fff; font-family: Arial; text-align:left; font-size: 20px; font-weight: bold; height: 50px; width: 450px; float:left; margin-top: 8px;">Venligst ikke svare på denne meddelelse den blev sendt fra en ukontrolleret e-mailadresse</td>
        <td style="height: 60px; width: 80px; float: left; margin-left: 20px;"><a href="http://eshooting.dk/"><img src="http://eshooting.dk/img/logo.png" width="80" alt="Logo"></a></td>
    </tr>
</table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: <eShooting.dk>' . "\r\n";

$errors = array();
 
// Valider email

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) 
{
        $errors[] = "E-mail'en var ugyldig.";
}

$sql = "SELECT * FROM es_medlemmer WHERE email='$email'";
$res = $objCon->query($sql);
$emails = $res->num_rows;

if ($emails == 0)
{
    $errors[] = "E-mail ikke fundet.";
}

if (sizeof($errors) > 0) {
	  
	$_SESSION["glemtkodeordfejl"] = $errors;
    
    $_SESSION["glemtkodeordmsg"] = array(
				"email" => $email);
	
	header("location:glemt_kodeord.php");

}

else {
		
	mail($to, $subject, $message, $headers);
	
	unset($_SESSION["glemtkodeordmsg"]);
	
	$_SESSION["glemtkodeordsendt"] = "Dit kodeord er nu sendt på mail!";
	
	header("location:glemt_kodeord.php");

}

?>