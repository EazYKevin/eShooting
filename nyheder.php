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
<title>eShooting.dk - Nyheder</title>

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
            	<h1>Nyheder!</h1>
            </div>
            <div id="nyheder">
				<?php                       
                    $per_page=5;
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                        $prev = $page - 1;
                        $next = $page + 1;
                    }
                    else {
                        header('location:nyheder.php?page=1');
                    }
                    // Page will start from 0 and Multiple by Per Page
                    $start_from = ($page-1) * $per_page;
                    //Selecting the data from table but with limit
                    $sql = "SELECT * FROM es_nyheder LIMIT $start_from, $per_page";
                    $res = $objCon->query($sql);
                ?>
                <?php
                    while ($row = $res-> fetch_array()) {
                        $id = $row['id'];
                        echo "<div class='nyhed2'>";
						echo "<div class='nyhedimg2'>";
						echo "<img src='img/csgo.png' />";
						echo "</div>";
                        echo "<div class='nyhedtitle2'>";									
                        echo "<h3>";
                        echo substr ($row['title'] , 0, 18) . "...";	
                        echo "</h3>";
                        echo "</div>";
                        echo "<div class='nyhedtext2'>";
                        echo "<p>";	
                        echo substr ($row['tekst'] , 0, 38) . ".....";				
                        echo "</p>";
                        echo "</div>";
                        echo "<div class='nyheddato2'>";
                        echo "<p>";
                        echo "D. ";
                        echo date('d-m-Y', strtotime($row['dato']));	
                        echo "</p>";
                        echo "</div>";
                        echo "<div class='nyhedmere2'>";
                        echo "<a href='nyhed2.php?id=$id'>Læs mere</a>";
                        echo "</div>";
                        echo "</div>";
                    };
                ?>
                <?php
                    //Now select all from table
                    $sql = "SELECT * FROM es_nyheder";
                    $res = mysqli_query($objCon, $sql);
                    // Count the total records
                    $total_records = mysqli_num_rows($res);
                    //Using ceil function to divide the total records on per page
                    $total_pages = ceil($total_records / $per_page);
                    //Going to first page
                    echo "<div id='paginationcenter'><div id='pagination'><a href='nyheder.php?page=1'>".'First Page'."</a> ";
                    // Going to prev page
                    echo "<a href='nyheder.php?page=$prev'>".'Prev Page'."</a>";
                    // All Pages
                    for ($i=1; $i<=$total_pages; $i++) {
                        echo "<a ";
                        if($page == $i){
                            echo "class='currentpage'";
                        }
                        echo " href='nyheder.php?page=".$i."'>".$i."</a> ";
                    };
                    // Going to next page
                    echo "<a href='nyheder.php?page=$next'>".'Next Page'."</a>";
                    // Going to last page
                    echo "<a href='nyheder.php?page=$total_pages'>".'Last Page'."</a></div></div>";
                ?>
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