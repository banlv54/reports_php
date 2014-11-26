<?php
	$isset_cookie = false;
	$isset_session = false;
	setcookie("name_cookie1","Name khoi tao boi cookie<br>",time()+1800);
	
	if(!isset($_COOKIE['name_cookie1'])) {
		echo "<br>Cookie name_cookie1 is not set!<br>";
	} else {
		$isset_cookie = true;
		echo "<br>".$_COOKIE['name_cookie1']."<br>";
	}
	if ($isset_cookie){
		Setcookie("name_cookie1");
		if(!isset($_COOKIE['name_cookie1'])) {
			echo "<br>Da xoa name_cookie1!<br>";
		}
	}
	

	session_start();
	$_SESSION["name_session"] = "Name khoi tao boi sesion<br>";
	if(isset($_SESSION['name_session'])) {
		$isset_session = true;
		echo $_SESSION['name_session']."<br>";
	} else{
		echo "Chua thiet lap session name_session.<br>";
	}
	if ($isset_session){
		unset($_SESSION['name_session']);
		if(!isset($_SESSION['name_session'])) {
			echo "Da xoa session.<br>";
		}
	}
?>