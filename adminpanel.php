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


<!-- GET -->
<?php
    $idnyhedrediger = $_GET['idnyhedrediger'];
    $idkamperediger = $_GET['idkamperediger'];
    $idtab = $_GET['idtab'];
    if($idtab == null){
        $idtab = 1;
    }
?>

<!-- Title -->
<title>eShooting.dk - Admin Panel</title>

<!-- Css -->
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<!-- Favicon -->
<link rel="icon" href="img/csgo.png" type="image/x-icon"/>
<link rel="shortcut icon" href="img/csgo.png" type="image/x-icon"/>

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

<!-- jQuery -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-2.1.1.min.js"></script>
<script>
$(document).ready(function() {
    
    $("#admincontent").find("[id^='tab']").hide(); // Hide all content
    $("#admintabs li:nth-child(<?php echo $idtab;?>)").attr("id","current"); // Activate the first tab
    $("#admincontent #tab<?php echo $idtab;?>").fadeIn(); // Show first tab's content
    $('#admintabs a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return;       
        }
        else{             
          $("#admincontent").find("[id^='tab']").hide(); // Hide all content
          $("#admintabs li").attr("id",""); //Reset id's
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
            	<h1>Admin Panel!</h1>
            </div>
            <div id="adminpanel">
                <ul id="admintabs">
                    <li><a href="#" name="tab1">Nyheder</a></li>
                    <li><a href="#" name="tab2">Kampe</a></li>
                    <li><a href="#" name="tab3">Filer</a></li>
                    <li><a href="#" name="tab4">Brugere</a></li>
                    <li><a href="#" name="tab5">Beskeder</a></li>
                </ul>
                <div id="admincontent"> 
                    <div id="tab1">
                        <?php
                            if(isset($_GET['idnyhedrediger'])){
                                $sql = "SELECT * FROM es_nyheder WHERE id = $idnyhedrediger";
                                $res = $objCon->query($sql);
                                while ($row = $res-> fetch_array()) {
                                    echo '<form action="nyheder_opdater.php" method="post">';
                                    echo '<label>';
                                    echo '<h2>Rediger Nyhed</h2>';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span>Title:</span>';
                                    echo '<input type="text" name="title" value="';
                                    echo $row['title'];
                                    echo '">';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span>Tekst:</span>';
                                    echo '<textarea name="tekst">';
                                    echo $row['tekst'];
                                    echo '</textarea>';
                                    echo '</label>';
                                    echo '<label hidden="hidden">';
                                    echo '<span></span>';
                                    echo '<input type="hidden" name="id" value="';
                                    echo $idnyhedrediger;
                                    echo '">';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span></span>';
                                    echo '<input title="Rediger Nyhed" type="submit" value="Rediger Nyhed">';
                                    echo '</label>';
                                    echo '</form>';
                                }
                            }
                            else{
                                echo '<form action="nyheder_opret.php" method="post">';
                                echo '<label>';
                                echo '<h2>Opret Nyhed</h2>';
                                echo '</label>';
                                echo '<label>';
                                echo '<span>Title:</span>';
                                echo '<input type="text" name="title">';
                                echo '</label>';
                                echo '<label>';
                                echo '<span>Tekst:</span>';
                                echo '<textarea name="tekst"></textarea>';
                                echo '</label>';
                                echo '<label>';
                                echo '<span></span>';
                                echo '<input title="Opret" type="submit" value="Opret">';
                                echo '</label>';
                                echo '</form>';
                            }
                        ?>  
                        <hr>
                        <?php
                            $sql = "SELECT * FROM es_nyheder ORDER BY id DESC";
                            $res = $objCon->query($sql);
                            while ($row = $res-> fetch_array()) {
                                $id = $row['id'];
                                echo '<div class="adminnews">';
                                echo "<h3>";
                                echo substr ($row['title'] , 0, 15) . "...";	
                                echo "</h3>";
                                echo "<p>";	
                                echo substr ($row['tekst'] , 0, 36) . ".....";				
                                echo "</p>";
                                echo "<p>";
                                echo date('d-m-Y', strtotime($row['dato']));	
                                echo "</p>";
                                echo '<a title="Rediger Nyhed" href="adminpanel.php?idnyhedrediger='.$id.'&idtab=1"><i class="fa fa-pencil-square"></i></a>';
                                echo '<a title="Slet Nyhed" href="nyheder_slet.php?idnyhedslet='.$id.'&idtab=1"><i class="fa fa-trash"></i></a>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <div id="tab2">
                        <?php
                            if(isset($_GET['idkamperediger'])){
                                $sql = "SELECT * FROM es_kampe WHERE id = $idkamperediger";
                                $res = $objCon->query($sql);
                                while ($row = $res-> fetch_array()) {
                                    echo '<form action="kampe_opdater.php" method="post">';
                                    echo '<label>';
                                    echo '<h2>Rediger Kamp</h2>';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span>Dato:</span>';
                                    echo '<input type="date" name="dato" value="';
                                    echo $row['dato'];
                                    echo '">';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span>Hold:</span>';
                                    echo '<select name="hold" value="';
                                    echo $row['hold'];
                                    echo '">';
                                    echo '<option value="eShooting.dk - CS:GO">eShooting.dk - CS:GO</option>';
                                    echo '<option value="eShooting.dk - Staff">eShooting.dk - Staff</option>';
                                    echo '</select>';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span>Modstander:</span>';
                                    echo '<input type="text" name="modstander" value="';
                                    echo $row['modstander'];
                                    echo '">';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span>Bedst ud af:</span>';
                                    echo '<select name="bedstudaf">';
                                    echo '<option value="';
                                    echo $row['bo'];
                                    echo '">';
                                    echo $row['bo'];
                                    echo '</option>';
                                    echo '<option value="1">1</option>';
                                    echo '<option value="2">2</option>';
                                    echo '<option value="3">3</option>';
                                    echo '<option value="4">4</option>';
                                    echo '<option value="5">5</option>';
                                    echo '</select>';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span>Score Hjemme:</span>';
                                    echo '<select name="resultat1">';
                                    echo '<option value="';
                                    echo $row['resultat1'];
                                    echo '">';
                                    echo $row['resultat1'];
                                    echo '</option>';
                                    echo '<option value="0">0</option>';
                                    echo '<option value="1">1</option>';
                                    echo '<option value="2">2</option>';
                                    echo '<option value="3">3</option>';
                                    echo '<option value="4">4</option>';
                                    echo '<option value="5">5</option>';
                                    echo '</select>';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span>Score Ude:</span>';
                                    echo '<select name="resultat2">';
                                    echo '<option value="';
                                    echo $row['resultat2'];
                                    echo '">';
                                    echo $row['resultat2'];
                                    echo '</option>';
                                    echo '<option value="0">0</option>';
                                    echo '<option value="1">1</option>';
                                    echo '<option value="2">2</option>';
                                    echo '<option value="3">3</option>';
                                    echo '<option value="4">4</option>';
                                    echo '<option value="5">5</option>';
                                    echo '</select>';
                                    echo '</label>';
                                    echo '<input type="hidden" name="id" value="';
                                    echo $idkamperediger;
                                    echo '">';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span></span>';
                                    echo '<input title="Rediger Kamp" type="submit" value="Rediger">';
                                    echo '</label>';
                                    echo '</form>';
                                }
                            }
                            else{
                                echo '<form action="kampe_opret.php" method="post">';
                                echo '<label>';
                                echo '<h2>Opret Kamp</h2>';
                                echo '</label>';
                                echo '<label>';
                                echo '<span>Dato:</span>';
                                echo '<input type="date" name="dato">';
                                echo '</label>';
                                echo '<label>';
                                echo '<span>Hold:</span>';
                                echo '<select name="hold">';
                                echo '<option value="eShooting.dk - CS:GO">eShooting.dk - CS:GO</option>';
                                echo '<option value="eShooting.dk - Staff">eShooting.dk - Staff</option>';
                                echo '</select>';
                                echo '</label>';
                                echo '<label>';
                                echo '<span>Modstander:</span>';
                                echo '<input type="text" name="modstander">';
                                echo '</label>';
                                echo '<label>';
                                echo '<span>Bedst ud af:</span>';
                                echo '<select name="bedstudaf">';
                                echo '<option value="1">1</option>';
                                echo '<option value="2">2</option>';
                                echo '<option value="3">3</option>';
                                echo '<option value="4">4</option>';
                                echo '<option value="5">5</option>';
                                echo '</select>';
                                echo '</label>';
                                echo '<label>';
                                echo '<span>Score Hjemme:</span>';
                                echo '<select name="resultat1">';
                                echo '<option value="0">0</option>';
                                echo '<option value="1">1</option>';
                                echo '<option value="2">2</option>';
                                echo '<option value="3">3</option>';
                                echo '<option value="4">4</option>';
                                echo '<option value="5">5</option>';
                                echo '</select>';
                                echo '</label>';
                                echo '<label>';
                                echo '<span>Score Ude:</span>';
                                echo '<select name="resultat2">';
                                echo '<option value="0">0</option>';
                                echo '<option value="1">1</option>';
                                echo '<option value="2">2</option>';
                                echo '<option value="3">3</option>';
                                echo '<option value="4">4</option>';
                                echo '<option value="5">5</option>';
                                echo '</select>';
                                echo '</label>';
                                echo '<label>';
                                echo '<span></span>';
                                echo '<input title="Opret" type="submit" value="Opret">';
                                echo '</label>';
                                echo '</form>';
                            }
                        ?>  
                        <hr>
                        <?php
                            $sql = "SELECT * FROM es_kampe ORDER BY id DESC";
                            $res = $objCon->query($sql);
                            while ($row = $res-> fetch_array()) {
                                $id = $row['id'];
                                echo '<div class="kampe">';
                                echo "<h3>";
                                echo $row['hold'];
                                echo "</h3>";
                                echo '<p>';
                                echo 'VS';
                                echo '</p>';
                                echo "<p>";	
                                echo $row['modstander'];		
                                echo "</p>";
                                echo "<p>";
                                echo date('d-m-Y', strtotime($row['dato']));	
                                echo "</p>";
                                echo "<p>";
                                echo 'Bo';
                                echo $row['bo'];			
                                echo "</p>";
                                echo '<a title="Rediger Kamp" href="adminpanel.php?idkamperediger='.$id.'&idtab=3"><i class="fa fa-pencil-square"></i></a>';
                                echo '<a title="Slet Kamp" href="kampe_slet.php?idkampeslet='.$id.'&idtab=3"><i class="fa fa-trash"></i></a>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <div id="tab3">
                        <div class="filer">
                            <h3>Cfg's</h3>
                            <form>
                                <label>
                                    <span>Title:</span>
                                    <input type="text">
                                </label>
                                <label>
                                    <span>Tekst:</span>
                                    <input type="text">
                                </label>
                                <label>
                                    <span>Fil:</span>
                                    <input type="file">
                                </label>
                                <label>
                                    <span></span>
                                    <input title="Opret" type="submit" value="Opret">
                                </label>
                            </form>
                            <?php
                                $sql = "SELECT * FROM es_downloads WHERE cfg='1' ORDER BY id ASC";
                                $res = $objCon->query($sql);
                                while ($row = $res-> fetch_array()) {
                                    $id = $row['id'];
                                    echo '<div class="filerlist">';
                                    echo "<h4>";
                                    echo $row['title'];
                                    echo "</h4>";
                                    echo "<p>";	
                                    echo substr ($row['text'] , 0, 36) . ".....";				
                                    echo "</p>";
                                    echo '<a title="Slet Fil" href="#"><i class="fa fa-trash"></i></a>';
                                    echo '</div>';
                                }
                            ?>
                            <hr>
                            <h3>Misc's</h3>
                            <form>
                                <label>
                                    <span>Title:</span>
                                    <input type="text">
                                </label>
                                <label>
                                    <span>Tekst:</span>
                                    <input type="text">
                                </label>
                                <label>
                                    <span>Fil:</span>
                                    <input type="file">
                                </label>
                                <label>
                                    <span></span>
                                    <input title="Opret" type="submit" value="Opret">
                                </label>
                            </form>
                            <?php
                                $sql = "SELECT * FROM es_downloads WHERE misc='1' ORDER BY id ASC";
                                $res = $objCon->query($sql);
                                while ($row = $res-> fetch_array()) {
                                    $id = $row['id'];
                                    echo '<div class="filerlist">';
                                    echo "<h4>";
                                    echo $row['title'];
                                    echo "</h4>";
                                    echo "<p>";	
                                    echo substr ($row['text'] , 0, 36) . ".....";				
                                    echo "</p>";
                                    echo '<a title="Slet Fil" href="#"><i class="fa fa-trash"></i></a>';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                    <div id="tab4">
                        <h2>Rediger bruger rettigheder</h2>
                        <?php
                            $sql = "SELECT * FROM es_medlemmer ORDER BY id DESC";
                            $res = $objCon->query($sql);
                            while ($row = $res-> fetch_array()) {
                                $id = $row['id'];
                                echo '<div class="brugere">';
                                echo '<h3>';
                                echo $row['navn'];
                                echo ' "';
                                echo $row['nick'];
                                echo '" ';
                                echo $row['efternavn'];
                                echo '</h3>';
                                echo '<p>';
                                echo $row['email'];
                                echo '</p>';
                                echo '<a title="Tilføj til hold" href="#"><i class="fa fa-users"></i> <i class="fa fa-plus-circle"></i></i></a>';
                                echo '<a title="Fjern fra hold" href="#"><i class="fa fa-users"></i> <i class="fa fa-minus-circle"></i></a>';
                                echo '<a title="Tilføj til admin" href="#"><i class="fa fa-user"></i> <i class="fa fa-plus-circle"></i></a>';
                                echo '<a title="Fjern fra admin" href="#"><i class="fa fa-user"></i> <i class="fa fa-minus-circle"></i></a>';
                                echo '<a title="Fjern bruger" href="#"><i class="fa fa-user"></i> <i class="fa fa-trash"></i></a>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <div id="tab5">
                        <?php
                            if(isset($_GET['idnyhedrediger'])){
                                $sql = "SELECT * FROM es_nyheder WHERE id = $idnyhedrediger";
                                $res = $objCon->query($sql);
                                while ($row = $res-> fetch_array()) {
                                    echo '<form action="nyheder_opdater.php" method="post">';
                                    echo '<label>';
                                    echo '<h2>Svar Besked</h2>';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span>Title:</span>';
                                    echo '<input type="text" name="title" value="';
                                    echo $row['title'];
                                    echo '">';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span>Tekst:</span>';
                                    echo '<textarea name="tekst">';
                                    echo $row['tekst'];
                                    echo '</textarea>';
                                    echo '</label>';
                                    echo '<label hidden="hidden">';
                                    echo '<span></span>';
                                    echo '<input type="hidden" name="id" value="';
                                    echo $idnyhedrediger;
                                    echo '">';
                                    echo '</label>';
                                    echo '<label>';
                                    echo '<span></span>';
                                    echo '<input type="submit" value="Send Besked">';
                                    echo '</label>';
                                    echo '</form>';
                                }
                            }
                            else{
                                echo '<form action="nyheder_opret.php" method="post">';
                                echo '<label>';
                                echo '<h2>Send Besked</h2>';
                                echo '</label>';
                                echo '<label>';
                                echo '<span>Emne:</span>';
                                echo '<input type="text" name="title">';
                                echo '</label>';
                                echo '<label>';
                                echo '<span>Email:</span>';
                                echo '<input type="text" name="title">';
                                echo '</label>';
                                echo '<label>';
                                echo '<span>Besked:</span>';
                                echo '<textarea name="tekst"></textarea>';
                                echo '</label>';
                                echo '<label>';
                                echo '<span></span>';
                                echo '<input type="submit" value="Send Besked">';
                                echo '</label>';
                                echo '</form>';
                            }
                        ?>  
                        <hr>
                        <?php
                            $sql = "SELECT * FROM es_beskeder ORDER BY id DESC";
                            $res = $objCon->query($sql);
                            while ($row = $res-> fetch_array()) {
                                $id = $row['id'];
                                echo '<div class="beskeder">';
                                echo "<h3>";
                                echo substr ($row['navn'] , 0, 20) . "...";	
                                echo "</h3>";
                                echo "<p>";	
                                echo substr ($row['email'] , 0, 16) . "...";				
                                echo "</p>";
                                echo "<p>";
                                echo substr ($row['emne'] , 0, 32) . "...";		
                                echo "</p>";
                                echo '<a title="Læs Besked" href="#"><i class="fa fa-comment"></i></a>';
                                echo '<a title="Svar På Besked" href="#"><i class="fa fa-envelope"></i></a>';
                                echo '<a title="Slet Besked" href="#"><i class="fa fa-trash"></i></a>';
                                echo '</div>';
                            }
                        ?>
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
