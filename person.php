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
<?php
	$id = $_GET['id'];
?>

<!-- Title -->
<title>eShooting.dk - 
<?php
    $sql = "SELECT * FROM es_medlemmer WHERE id = $id";      
    $res = $objCon->query($sql);
    while ($row = $res-> fetch_array()) {
        echo $row['navn'];
        echo ' "';
        echo $row['nick'];
        echo '" ';
        echo $row['efternavn'];
    }
?>
</title>

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
            <?php
                $sql = "SELECT * FROM es_medlemmer WHERE id = $id";      
                $res = $objCon->query($sql);
                while ($row = $res-> fetch_array()) {
                    echo '<div id="contenttitle">';
                    echo '<h1>';
                    echo $row['nick'];
                    echo '!</h1>';
                    echo '</div>';
                    echo '<div id="nyheder">';
                    echo '<div class="team-spiller">';
                    echo '<div class="team-pic">';
                    echo '<img src="img/spillere/';
                    echo $row['billede'];
                    echo '">';
                    echo '</div>';
                    echo '<div class="team-info">';
                    echo '<h2>';
                    echo $row['navn'];
                    echo ' "';
                    echo $row['nick'];
                    echo '" ';
                    echo $row['efternavn'];
                    echo '</h2>';
                    echo'<p>';
                    echo 'Alder: ';
                    echo $row['alder'];
                    echo '</p>';
                    echo '<p>';
                    echo 'Land: ';
                    echo $row['land'];
                    echo '</p>';
                    echo '<img src="img/flag/';
                    echo $row['land'];
                    echo '.png">';
                    echo '<h3>';
                    echo $row['stilling'];
                    echo '</h3>';
                    echo '<h4>';
                    echo 'Medlem siden: ';
                    echo date('d-m-Y', strtotime($row['siden']));
                    echo '</h4>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="team-om">';
                    echo '<h2>Hardware Info</h2>';
                    echo '<table class="team-table">';
                    echo '<tr>';
                    echo '<td>CPU:</td>';
                    echo '<td>';
                    echo $row['cpu'];
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>RAM:</td>';
                    echo '<td>';
                    echo $row['ram'];
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Grafikkort:</td>';
                    echo '<td>';
                    echo $row['gpu'];
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Bundkort:</td>';
                    echo '<td>';
                    echo $row['bundkort'];
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Skærm:</td>';
                    echo '<td>';
                    echo $row['skærm'];
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Mus:</td>';
                    echo '<td>';
                    echo $row['mus'];
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Mussemåtte:</td>';
                    echo '<td>';
                    echo $row['mussemåtte'];
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Tastatur:</td>';
                    echo '<td>';
                    echo $row['tastatur'];
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Headset:</td>';
                    echo '<td>';
                    echo $row['headset'];
                    echo '</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '<div class="team-om">';
                    echo '<h2>Om</h2>';
                    echo '<p>';
                    echo nl2br($row['om']);
                    echo '</p>';
                    echo '</div>';
                    echo '<div class="team-scocial">';
                    echo '<h2>Social</h2>';
                    echo '<a href="';
                    echo $row['facebook'];
                    echo '"><img src="img/social/facebook.png"><p>Facebook</p></a>';
                    echo '<a href="';
                    echo $row['steam'];
                    echo '"><img src="img/social/steam.png"><p>Steam</p></a>';
                    echo '<a href="';
                    echo $row['twitch'];
                    echo '"><img src="img/social/twitch.png"><p>Twitch</p></a>';
                    echo '<a href="';
                    echo $row['youtube'];
                    echo '"><img src="img/social/youtube.png"><p>Youtube</p></a>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
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
