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
		include("connect-db.php");
		$email = filter_var($_POST['newEmail'], FILTER_SANITIZE_EMAIL);
		$query = "SELECT email FROM Customers WHERE email = '".$email."'";
		$result = pg_query($dbc, $query);
		if(!$result || pg_num_rows($result) > 0)
		{
			echo "Email already exists.<br>";
		}
		else
			updateAccount("email", $_POST["newEmail"]);
	}
	if(!empty($_POST['newFirstName']))
	{
		updateAccount("firstname", filter_var($_POST["newFirstName"]), FILTER_SANITIZE_STRING);
	}
	if(!empty($_POST['newLastName']))
	{
		updateAccount("lastname", filter_var($_POST["newLastName"]), FILTER_SANITIZE_STRING);
	}
	if(!empty($_POST['newZip']))
	{
		if(isValidZip($_POST['newZip']))
			updateAccount("zipcode", filter_var($_POST["newZip"]), FILTER_SANITIZE_STRING);
	}
	if(!empty($_POST['newAddress']))
	{
		updateAccount("streetaddress", filter_var($_POST["newAddress"]), FILTER_SANITIZE_STRING);
	}
	
	header("Location: ./Account.php");
?>

