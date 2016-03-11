<?php
    // Session
	session_start();
?>
<?php
    // Database Include
	require_once 'include/incl_db.php';		
?>
<?php
    // GET / POST
	$brugernavn =  $_POST['brugernavn'];
	$kodeord =  $_POST['kodeord'];
    $brugernavn = strtolower($brugernavn);
    $kodeord = strtolower($kodeord);
    $kodeord = md5($kodeord);
?>
<?php
    // Login Script
    $errors = array();
    $sql = "SELECT * FROM es_medlemmer WHERE brugernavn = '".$brugernavn."' AND kodeord = '".$kodeord."'";
    $res = $objCon->query($sql);
    $numrows = $res->num_rows;
    if($numrows !=0)
    {
        while ($row = $res->fetch_array()) {
            $dbbrugernavn = $row['brugernavn'];
            $dbkodeord = $row['kodeord'];
            $dbretigheder = $row['rettigheder'];
            
        }
    if($brugernavn == $dbbrugernavn && $kodeord == $dbkodeord && $dbretigheder == 1) {
        $_SESSION['auth'] = 2;
        $_SESSION['brugernavn'] = $brugernavn;
        unset($_SESSION['LOGIN_ERRORS']);
        header('location:index.php'); // hvis login er rigtigt	
    }
    elseif($brugernavn == $dbbrugernavn && $kodeord == $dbkodeord && $dbretigheder == 0) {
        $_SESSION['auth'] = 1;
        $_SESSION['brugernavn'] = $brugernavn;
        unset($_SESSION['LOGIN_ERRORS']);
        header('location:index.php'); // hvis login er rigtigt	
    }
    }else{
        header('location:index.php'); //hvis login er forkert
        $errors = "Du har angivet forkert brugernavn eller adgangskode, prøv venligst igen!";
        $_SESSION["LOGIN_ERRORS"] = $errors;
    }
?>