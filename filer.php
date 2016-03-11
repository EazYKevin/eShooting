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
<title>eShooting.dk - Filer</title>

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
<script>
$(document).ready(function() {
    $("#filercontent").find("[id^='tab']").hide(); // Hide all content
    $("#tabs li:first").attr("id","current"); // Activate the first tab
    $("#filercontent #tab1").fadeIn(); // Show first tab's content
    
    $('#tabs a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return;       
        }
        else{             
          $("#filercontent").find("[id^='tab']").hide(); // Hide all content
          $("#tabs li").attr("id",""); //Reset id's
          $(this).parent().attr("id","current"); // Activate this
          $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
        }
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
            require_once 'include/menu.php';
        ?>
        <div id="content">
        	<div id="contenttitle">
            	<h1>Filer!</h1>
            </div>
            <div id="nyheder">
                <div id="filer">
					<ul id="tabs">
                        <li><a href="#" name="tab1">Cfg'er</a></li>
                        <li><a href="#" name="tab2">Misc</a></li>
                    </ul>
                    <div id="filercontent"> 
                        <div id="tab1">
                            <?php
								$sql = "SELECT * FROM es_downloads WHERE cfg='1' ORDER BY id ASC";
								$res = $objCon->query($sql);
								while ($row = $res-> fetch_array()) {
									$id = $row['id'];
									echo '<div class="download">';
									echo '<div class="downloadtitle">';
									echo '<h2>';
									echo $row['title'];
									echo '</h2>';
									echo '</div>';
									echo '<div class="downloadtext">';
									echo '<p>';
                                    echo substr ($row['text'] , 0, 70) . ".....";		
									echo '</p>';
									echo '</div>';
									echo '<div class="downloaddl">';
									echo '<a href="downloads/cfg/';
									echo $row['filnavn'];
									echo '"></a>';
									echo '</div>';
									echo '</div>';	
								}
							?>
                        </div>
                        <div id="tab2">
                        	<?php
								$sql = "SELECT * FROM es_downloads WHERE misc='1' ORDER BY id ASC";
								$res = $objCon->query($sql);
								while ($row = $res-> fetch_array()) {
									$id = $row['id'];
									echo '<div class="download">';
									echo '<div class="downloadtitle">';
									echo '<h2>';
									echo $row['title'];
									echo '</h2>';
									echo '</div>';
									echo '<div class="downloadtext">';
									echo '<p>';
									echo substr ($row['text'] , 0, 70) . ".....";
									echo '</p>';
									echo '</div>';
									echo '<div class="downloaddl">';
									echo '<a href="downloads/cfg/';
									echo $row['filnavn'];
									echo '"></a>';
									echo '</div>';
									echo '</div>';	
								}
							?>
                        </div>
                    </div>
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
