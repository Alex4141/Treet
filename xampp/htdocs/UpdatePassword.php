
<?php
	session_start();
	include("connect-db.php");
	include("passwordHashing.php");
	if(!isset($_SESSION["email"]))
		header("Location: ./index.php");
	
	if(!empty($_POST["oldPassword"])  &&  !empty($_POST["newPassword"])  &&  !empty($_POST["confirmPassword"]))
	{
		if($_POST["newPassword"] == $_POST["confirmPassword"])
		{
			if($_POST["newPassword"] != $_POST["oldPassword"])
			{
				if(checkPass($dbc, $_SESSION["email"], $_POST["oldPassword"]))		
				{
					
					$salt = pg_fetch_row(pg_query($dbc, "SELECT salt FROM customers WHERE customerid = " . $_SESSION["customerid"]))[0];
					
					$hashedPass = getHash(filter_var($_POST["newPassword"], FILTER_SANITIZE_STRING), $salt);
					
					$query = "UPDATE customers SET password = '" . $hashedPass . "' WHERE customerid = " . $_SESSION["customerid"];
					$result = pg_query($query);
					
					
					header("Location: ./account.php");
				}
				else
					echo "Incorrect Password";
			}
			else
				echo "The new password must be different";
		}
		else
			echo "Confirm Password must match New Password";
	}
	else
		echo "Please fill out all fields";
	
?>