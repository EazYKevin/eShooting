<?php
	function login($username, $password, $objCon) {
		$sql = "SELECT * FROM users WHERE username = '".$username."'";
		$res = $objCon->query($sql);
		$row = $res-> fetch_array();
			if($username != '' && $username != null && $password != '' && $password != null){	
				if (strtolower($username) == strtolower($row['username']) && $password == md5(trim($row['password']))) {
				$_SESSION['username'] = $row['username'];
				$_SESSION['auth'] = 2;
				$_SESSION['firstlogin'] = 1;
				unset($_SESSION['error']);
				return true;
				}
			else{
				$_SESSION['error'] = "Dit brugernavn eller password var forkert! Pr&oslash;v igen!";
				$_SESSION['firsterror'] = 1;
				unset($_SESSION['auth']);
				return false;			
			}
	}
	else{
		$_SESSION['error'] = "Et eller flere felter var tomme!";
		$_SESSION['firsterror'] = 1;
		unset($_SESSION['auth']);
		return false;
	}
}
?>