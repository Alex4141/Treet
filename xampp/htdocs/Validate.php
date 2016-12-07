
<?php
	session_start();
	include("connect-db.php");
	include("NavBar.php");
	echo "<div class=\"container\">";	
	Login($dbc);
	
	function Login($dbc)
	{
		if(empty($_POST['email']))
		{
			echo("Email is empty!");
			return false;
		}
		if(empty($_POST['password']))
		{
			echo("Password is empty!");
			return false;
		}
		
		$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
		$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
		
		if(!CheckLoginDB($email, $password, $dbc))
		{
			echo" Invalid Username or password";
			return false;
		}
		else
		{
			echo" Success!";
			header("Location: ./index.php");
			return true;
		}
		
		
		
	}
	
	
	function CheckLoginDB($email, $password, $dbc)
	{
		include("passwordHashing.php");
		
		if(checkPass($dbc, $email, $password))
		{
			
			$query = "SELECT firstname, lastname, email, streetaddress, zipcode, customerid, \"isAdmin\" FROM Customers WHERE email = '$email'";
			
			$result = pg_query($dbc, $query);
			$row = pg_fetch_row($result, 0);
			
			session_start();
			$_SESSION['firstname'] = $row[0];
			$_SESSION['lastname'] = $row[1];
			$_SESSION['email'] = $row[2];
			$_SESSION['address'] = $row[3];
			$_SESSION['zip'] = $row[4];
			$_SESSION['customerid'] = $row[5];
			$_SESSION['isAdmin'] = $row[6];
			return true;
		}
		return false;
	}
?>

	
	<p><a href="./Login.php"> Try Again </a></p>
</div>
<!-- Based on html-form-guide.com -->