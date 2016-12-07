
<?php
	include("connect-db.php");
	if (pg_connection_status($dbc) == 0)
		echo"Database is connected!";
	SignUp($dbc);
	
	function SignUp($dbc)
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
		if(empty($_POST['confirmPassword']))
		{
			echo("Confirm Password is empty!");
			return false;
		}
		
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$confirmPassword = trim($_POST['confirmPassword']);
		
		if($password != $confirmPassword)
		{
			echo "confirmPasswords do not match";
			return false;
		}
		
		if(!CheckEmail($email, $dbc))
		{
			echo "Failure";
			return false;
		}
		else
		{
			echo" Success!";
			header("Location: ./success.php");
			return true;
		}
		
		
		
		//session_start();
		//$_SESSION[$this->GetLoginSessionVar()] = $email;
	}
	
	
	function CheckEmail($email, $dbc)
	{
		$query = "SELECT email FROM Customers WHERE email = '$email'";
		
		$result = pg_query($dbc, $query);
		if(!$result || pg_num_rows($result) > 0)
		{
			echo "Email already exists.";
			return false;
		}
		return true;
	}
?>