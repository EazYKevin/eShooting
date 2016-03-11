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
<title>eShooting.dk - Min Profil</title>

<!-- Css -->
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<!-- Favicon -->
<link rel="icon" href="img/csgo.png" type="image/x-icon"/>
<link rel="shortcut icon" href="img/csgo.png" type="image/x-icon"/>

<!-- jQuery -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-2.1.1.min.js"></script>

</head>

<body>
<!-- Modal Login -->
<?php
	require_once 'include/modal_login.php';	
?>
<div id="container">
	<div id="wrapper">
    	<div id="logo">
        	<a href="index.php"><img src="img/logo.png" /></a>
        </div>
        <?php
            require_once 'include/menu.php';
        ?>
        <div id="content">
        	<div id="contenttitle">
            	<h1>Min Profil!</h1>
            </div>
            <div id="profil">
                <div id="profilpanelbillede">
                    <h2>Profil Billede</h2>
                    <img src="img/spillere/profil.jpg">
                    <form>
                        <label>
                            <span>Billede:</span>
                            <input type="file" value="Vælg Billede">
                        </label>
                        <label>
                            <input type="reset" value="Slet">
                            <input type="submit" value="Upload">
                        </label>
                    </form>
                </div>
                <div id="profilpanelkode">
                    <h2>Ændre Kodeord / Email</h2>
                    <form>
                        <label>
                            <span>Nuværdende Kodeord:</span>
                            <input type="text">
                        </label>
                        <label>
                            <span>Ny Kodeord:</span>
                            <input type="text">
                        </label>
                        <label>
                            <span>Nuværdende Email:</span>
                            <input type="text">
                        </label>
                        <label>
                            <span>Ny Email:</span>
                            <input type="text">
                        </label>
                        <label>
                            <span></span>
                            <input type="submit" value="Gem">
                        </label>
                    </form>
                </div>
                
                <div id="profilpanelom">
                    <h2>Om Mig</h2>
                    <form>
                        <label>
                            <span>Tekst:</span>
                            <textarea></textarea>
                        </label>
                        <label>
                            <input type="submit" value="Gem">
                        </label>
                    </form>
                </div>
                <div id="profilpanelinfo">
                    <h2>Information</h2>
                    <form>
                        <label>
                            <span>Navn & Efternavn:</span>
                            <input type="text">
                        </label>
                        <label>
                            <span>Nick:</span>
                            <input type="text">
                        </label>
                        <label>
                            <span>Alder:</span>
                            <input type="text">
                        </label>
                        <label>
                            <span>Land:</span>
                            <input type="text">
                        </label>
                        <label>
                            <span>Stilling:</span>
                            <input type="text">
                        </label>
                        <label>
                            <span></span>
                            <input type="submit" value="Gem">
                        </label>
                    </form>
                </div>
            </div>
        </div>
        <div id="scoial">
            <div id="scoialtitle1">
                <h2>Sponsorer / Partnere!</h2>
            </div>
            <div id="scoialtitle2">
                <h2>Social!</h2>
            </div>
            <div id="sponsorer">
				<?php 
                    $sql = "SELECT * FROM es_sponsorer ORDER BY id ASC";
                    $res = $objCon->query($sql);
                    while ($row = $res-> fetch_array()) {
                        echo '<a href="'.$row["hjemmeside"].'"><img src="img/sponsor-partner/'.$row["billede"].'" alt="'.$row["navn"].'" /></a>';
                    }
                ?>
            </div>
            <div id="scoiale">
            	<?php 
                    $sql = "SELECT * FROM es_scoial ORDER BY id ASC";
                    $res = $objCon->query($sql);
                    while ($row = $res-> fetch_array()) {
                        echo '<a href="'.$row["hjemmeside"].'"><img src="img/social/'.$row["billede"].'" alt="'.$row["navn"].'" /></a>';
                    }
                ?>         
            </div>
        </div>
        <div id="footer">
        	<p>Copyright © <?php $datetime = new DateTime(); echo $datetime->format('Y'); ?> eShooting.dk All Rights Reserved</p>
        </div>
    </div>
</div>

</body>

</html>
