<?php
	function getHash($password, $salt)
	{
		$algo = "sha256";
		$hash1 = hash($algo, $password);
		$hash2 = hash($algo, $salt);
		$hash = hash($algo, $hash1 . $hash2);
		$hash = hash($algo, $hash1 . $hash2 . $hash . $password);
		
		return $hash;
	}
	
	function addSalt($dbc, $customerid)
	{
		$query = "SELECT salt FROM customers WHERE customerid = " . $customerid;
		$result = pg_query($dbc, $query);
		if(pg_num_rows($result) == 1)
		{
			// Check that there is not already a salt for that person
			if(pg_fetch_row($result, 0)[0] == "")
			{
				$salt = generateSalt();
				//$query = "UPDATE customers SET salt = '" . $salt . "' WHERE customerid = " . $customerid;
				//if(pg_query($dbc, $query))
					//echo "Salt added!";
					return $salt;
			}
		}
	}
	
	function generateSalt()
	{
		$salt = rand();
		$salt = hash("sha256", $salt);
		
		return $salt;
	}
	
	function checkPass($dbc, $email, $passwordAttempt)
	{
		$query = "SELECT salt, password FROM customers WHERE email = '$email'";
		$result = pg_query($dbc, $query);
		if(pg_num_rows($result) == 1)
		{
			$salt = pg_fetch_row($result, 0)[0];
			
			$hashedAttempt = getHash($passwordAttempt, $salt);
			
			$storedPass = pg_fetch_row($result, 0)[1];
			
			return $hashedAttempt == $storedPass;
		}
		return false;
	}
	
	
	function printAsTable($result)
	{
		echo "<table class=\"table table-bordered\">";
		for($i = 0; $i < pg_num_rows($result); $i++)
		{
			echo "<tr>";
			$row = pg_fetch_row($result, $i);
			
			for($j = 0; $j < sizeof($row); $j++)
			{
				echo "<td>";
				
				echo $row[$j];
				
				echo "</td>";
			}
			
			echo "</tr>";
		}
		echo "</table>";
	}
?>