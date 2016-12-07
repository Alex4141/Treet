<?php
	session_start();
	include "NavBar.php";
	
	function completeTransaction(){
		include("connect-db.php");
		$query = "UPDATE cart SET \"transactionComplete\" = true WHERE customerid = " . $_SESSION["customerid"];
		pg_query($dbc, $query);
	}
	
	completeTransaction();
	echo "Transaction Complete";
?>

