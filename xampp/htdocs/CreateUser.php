
<?php
	session_start();
	include("NavBar.php");
	include("connect-db.php");
	if (pg_connection_status($dbc) <> 0)
		echo "Error connecting to the database";
	echo "<div class=\"container\">";
	SignUp($dbc);
	
	function SignUp($dbc)
	{
		if(empty($_POST['firstname']))
		{
			echo("First Name is empty!");
			return false;
		}
		if(empty($_POST['lastname']))
		{
			echo("Last Name is empty!");
			return false;
		}
		if(empty($_POST['email']))
		{
			echo("Email is empty!");
			return false;
		}
		if(empty($_POST['address']))
		{
			echo("Address is empty!");
			return false;
		}
		if(empty($_POST['zip']))
		{
			echo("Zipcode is empty!");
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
		
		$firstname = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
		$lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
		$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
		$address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
		$zip = filter_var(trim($_POST['zip']), FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
		$confirmPassword = filter_var(trim($_POST['confirmPassword']), FILTER_SANITIZE_STRING);
		
		if($password != $confirmPassword)
		{
			echo "confirmPasswords do not match";
			return false;
		}
		
		if(!CheckEmail($email, $dbc))
		{
			echo "Failed to create User";
			return false;
		}
		else
		{
			if(AddUser($firstname, $lastname, $email, $address, $zip, $password, $dbc))
			{
				echo" Success!";
				
				$query = "SELECT customerid, \"isAdmin\" FROM customers WHERE email = '$email'";
				$result = pg_query($dbc, $query);
				$row = pg_fetch_row($result);
				
				$_SESSION['customerid'] = $row[0];
				$_SESSION['firstname'] = $firstname;
				$_SESSION['lastname'] = $lastname;
				$_SESSION['email'] = $email;
				$_SESSION['address'] = $address;
				$_SESSION['zip'] = $zip;
				$_SESSION['isAdmin'] = $row[1];
				
				header("Location: ./index.php");
				return true;
			}
			else
			{
				echo "Failed to create user.";
				return false;
			}
		}
	}
	
	function AddUser($firstname, $lastname, $email, $address, $zip, $password, $dbc)
	{
		include("passwordHashing.php");
		
		$salt = generateSalt();
		$hashedPass = getHash($password, $salt);
		
		$query = "INSERT INTO customers (firstname, lastname, email, streetaddress, zipcode, password, salt)
		VALUES('$firstname', '$lastname', '$email', '$address', '$zip', '$hashedPass', '$salt')";
		
		$result = pg_query($dbc, $query);
		echo "<br>";
		echo $result;
		if(!$result)
		{
			echo "Problem with query.";
			return false;
		}
		else if(pg_num_rows($result) > 0)
		{
			echo "Email already exists.";
			return false;
		}
		return true;
		
		//Check that user is added
		$query = "SELECT email FROM Customers WHERE email = '$email'";
		
		$result = pg_query($dbc, $query);
		if(!$result || pg_num_rows($result) != 1)
		{
			echo "User not added.";
			return false;
		}
		return true;
	}
	
	function CheckEmail($email, $dbc)
	{
		//$email = SanitizeForSQL($email);
		//$password = SanitizeForSQL($password);// Add hashing here later
		$query = "SELECT email FROM Customers WHERE email = '$email'";
		
		
		//Check if email is valid
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			echo "Email is not valid<br>";
			return false;
		}
		
		$result = pg_query($dbc, $query);
		if(!$result || pg_num_rows($result) > 0)
		{
			echo "Email already exists.<br>";
			return false;
		}
		
		
		return true;
	}
?>
	<p><a href="./SignUp.php"> Try Again </a></p>
</div>
<!-- Based on html-form-guide.com -->