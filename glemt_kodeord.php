<!-- Session -->
<?php
	session_start();
    error_reporting(0);
	if(isset($_SESSION["glemtkodeordmsg"])){							
		$email = $_SESSION["glemtkodeordmsg"]["email"];
	}else{
		$email = "";
	}
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
<title>eShooting.dk - Glemt Kodeord</title>

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
<script type="text/javascript">
$('.alert2').click(function() {
    $('p').css({top: 0, opacity: 0}).
    animate({top: 50, opacity: 1}, 'slow');
});
</script>
<script type="text/javascript">
	$(document).ready(function () {
		<?php
			if (isset($_SESSION["glemtkodeordfejl"]))
            {
		?>
			$( ".alert2" ).animate({
				opacity: 1,
				height: "toggle"
				}, 1000, function() {
				// Animation complete.
			});
		<?php 
			}
		?>
			$('.close').click(function() {
				$( ".alert2" ).animate({
					opacity: 0,
					marginBottom:0,
					paddingBottom:0,
					paddingTop:0,
					height: "toggle"
					}, 1000, function() {
					// Animation complete.
				});
			});
		});
		$(document).ready(function () {
		<?php
			if (isset($_SESSION["glemtkodeordsendt"]))
            {
		?>
			$( ".alert2" ).animate({
				opacity: 1,
				height: "toggle"
				}, 1000, function() {
				// Animation complete.
			});
		<?php 
			}
		?>
		$('.close').click(function() {
			$('.alert2').fadeOut();
		});
	});
</script>
    
<script>
$(document).ready(function(e) {
    $('#fokus').focus();
});
</script>

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
            	<h1>Har du glemt dit kodeord?</h1>
            </div>
            <div id="glemt_kodeord">
                <form action="glemt_kodeord_send.php" method="POST">
                    <label>
                        <p>Så skal du udfylde din E-mail adresse herunder, så sender vi dig en mail med dit kodeord.</p>
                    </label>
                    <label>
                        <?php
                            if (isset($_SESSION["glemtkodeordfejl"]))
                            {
                                $errors = $_SESSION["glemtkodeordfejl"];
                                echo '<div class="alert2 alert-danger warringsize">';
                                echo '<div class="close" id="luk">&times;</div>';
                                echo '<h2>';
                                echo 'Fejl!';
                                echo '</h2>';
                                foreach ($errors as $error) {
                                    echo '<p class="red">';
                                    echo $error . " <br />"; 
                                    echo '</p>';
                                }
                                echo '</div>';
                                unset($_SESSION["glemtkodeordfejl"]);
                            }
                        ?>
                        <?php
                            if (isset($_SESSION["glemtkodeordsendt"]))
                            {
                                $sendt = $_SESSION["glemtkodeordsendt"];
                                echo '<div class="alert2 fade out alert-success warringsize">';
                                echo '<div class="close" id="luk">&times;</div>';
                                echo '<h2>';
                                echo 'Tilykke!';
                                echo '</h2>';
								echo '<p class="green">';
								echo $sendt;
								echo '</p>';
                                echo '</div>';
                                unset($_SESSION["glemtkodeordsendt"]);
                            }
                        ?>
                    </label>
                    <label>
                        <span class="required">*</span>
                        <span>E-mail:</span>
                        <input type="email" name="email" value="<?php echo $email ?>">
                    </label>    
                    <label>
                        <span class="required"></span>
                        <span></span>
                        <input type="submit" value="Send mig mit kodeord på mail" name="opret">
                    </label>
                    <label>
                        <p>Felter med</p><p> * </p><p>skal udfyldes</p>
                    </label>                                                         
                </form>					
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
