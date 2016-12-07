<?php
	session_start();
	
	function updateAccount($column, $value){
		include("connect-db.php");
		$query = "UPDATE customers SET " . $column . " = '".$value."' WHERE customerid = " . $_SESSION["customerid"];
		pg_query($dbc, $query);
	}
	function isValidZip($zip)
	{
		if(strlen($zip) != 5)
			return false;
		
		return true;
	}
	
	
	if(!empty($_POST['newEmail']))
	{
		updateAccount("email", $_POST["newEmail"]);
	}
	if(!empty($_POST['newFirstName']))
	{
		updateAccount("firstname", $_POST["newFirstName"]);
	}
	if(!empty($_POST['newLastName']))
	{
		updateAccount("lastname", $_POST["newLastName"]);
	}
	if(!empty($_POST['newZip']))
	{
		if(isValidZip($_POST['newZip']))
			updateAccount("zipcode", $_POST["newZip"]);
	}
	if(!empty($_POST['newAddress']))
	{
		updateAccount("streetaddress", $_POST["newAddress"]);
	}
	
	header("Location: ./Account.php");
?>

