<?php
	function logOut(){
		session_unset();
		session_destroy();
		$_SESSION = array();
	}
	
	session_start();
	echo "Cart ID: " . $_SESSION["cartid"];
	echo "<br>";
	logOut();
	echo "Logging Out!";
	header("Location: ./index.php");
?>


