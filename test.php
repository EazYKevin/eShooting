<!-- Session -->
<?php
    error_reporting(0);
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Database Include -->
<?php	
	require_once 'include/incl_db.php';		
?>

<!-- Functions -->
<?php
	require_once 'functions/functions.php';
?>

<!-- Classes -->
<?php
	function myAutoloader($class) {
	$class = strtolower($class);
	require_once $class . '.php';
	}
	spl_autoload_register('myAutoloader');
?>

<!-- GET -->

<!-- Title -->
<title>eShooting.dk - Forside</title>


<!-- Favicon -->
<link rel="icon" href="img/csgo.png" type="image/x-icon"/>
<link rel="shortcut icon" href="img/csgo.png" type="image/x-icon"/>

<!-- jQuery -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-2.1.1.min.js"></script>

</head>

<body>

    <table style="border-collapse: collapse; width: 600px;">
        <tr style="height: 180px;width: 600px;float: left; padding-top: 20px;background-image: url(http://eshooting.dk/img/bg.png); border-top-left-radius: 10px;border-top-right-radius: 10px;">
            <td style="width: 235px;"><a href="http://eshooting.dk/"><img src="http://eshooting.dk/img/logo.png" width="200" alt="Logo"></a></td>
            <td style="color: #fff; font-size:50px; font-family:fantasy; text-align:left;">Glemt kodeord?</td>
        </tr>
        <tr style="height: 450px;width: 588px;float: left; padding-left: 10px; font-family: Arial; text-align:left; font-size: 20px; font-weight: bold; background-color: #f9f9f9; border: 1px solid #ccc;">
            <td style="width:598px; height: 20px; float:left; margin-top: 20px; margin-bottom: 30px; font-size: 30px;">Hej EazY.</td>
            <td style="width:598px; height: 20px; float:left; margin-bottom: 25px;font-size: 25px;">Her er dine login informationer</td>
            <td style="width:598px; height: 20px; float:left; margin-bottom: 5px;">Brugernavn: EazY</td>
            <td style="width:598px; height: 20px; float:left; margin-bottom: 20px;">Kodeord: kkp157</td>
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
