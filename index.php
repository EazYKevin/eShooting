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
			if (isset($_SESSION["LOGIN_ERRORS"]))
            {
		?>
			$( ".alert-login" ).animate({
				opacity: 1,
				height: "toggle"
				}, 1000, function() {
				// Animation complete.
			});
		<?php 
			}
		?>
			$('.close').click(function() {
				$( ".alert-login" ).animate({
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
            $('.close').click(function() {
                $('.alert-login').fadeOut();
            });
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
            if(isset($_SESSION["LOGIN_ERRORS"])){							
                $errors = $_SESSION["LOGIN_ERRORS"];
                echo '<div class="alert-login alert-danger">';
                echo '<div class="close" id="luk">&times;</div>';
                echo '<p class="red">';
                echo $errors;
                echo '</p>';
                echo '</div>';
            }else{
                $errors = "";
            }
        ?>
        <?php
            require_once 'include/menu.php';
        ?>
        <div id="content">
        	<div id="contenttitle">
            	<h1>Seneste Nyheder!</h1>
            </div>
            <div id="nyheder">
				<?php
                    $sql = "SELECT * FROM es_nyheder ORDER BY id DESC LIMIT 3";
                    $res = $objCon->query($sql);
                    while ($row = $res-> fetch_array()) {
                        $id = $row['id'];
                        echo "<div class='nyhed'>";
						echo "<div class='nyhedimg'>";
						echo "<img src='img/csgo-nyhed.png' />";
						echo "</div>";
                        echo "<div class='nyhedtitle'>";								
                        echo "<h3>";
                        echo substr ($row['title'] , 0, 45) . "...";	
                        echo "</h3>";
                        echo "</div>";
                        echo "<div class='nyhedtext'>";
                        echo "<p>";	
                        echo substr ($row['tekst'] , 0, 380) . ".....";				
                        echo "</p>";
                        echo "</div>";
                        echo "<div class='nyheddato'>";
                        echo "<p>";
                        echo "Skrevet Den. ";
                        echo date('d-m-Y', strtotime($row['dato']));	
                        echo "</p>";
                        echo "</div>";
                        echo "<div class='nyhedmere'>";
                        echo "<a href='nyhed.php?id=$id'>Læs mere</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
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
