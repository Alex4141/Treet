<?php
	session_start();
	include 'NavBar.php';
	
	if(!isset($_SESSION["email"]))
		header("Location: ./index.php");
?>

<body>
	<div class="container">
		<form action="updateAccount.php" method="post">
			<table class="table">
				<tr class="table-danger">
					<td style="font-weight: bold">First Name</td>
					<td><?php echo getInfo("firstname")?></td>
					<td><input type="text" name="newFirstName"></td>
				</tr>
				<tr class="table-danger">
					<td style="font-weight: bold">Last Name</td>
					<td><?php echo getInfo("lastname")?></td>
					<td><input type="text" name="newLastName"></td>
				</tr>
				<tr class="table-danger">
					<td style="font-weight: bold">Email</td>
					<td><?php echo getInfo("email")?></td>
					<td><input type="text" name="newEmail"></td>
				</tr>
				<tr class="table-danger">
					<td style="font-weight: bold">Address</td>
					<td><?php echo getInfo("streetaddress")?></td>
					<td><input type="text" name="newAddress"></td>
				</tr>
				<tr class="table-danger">
					<td style="font-weight: bold">Zip</td>
					<td><?php echo getInfo("zipcode")?></td>
					<td><input type="text" name="newZip"></td>
				</tr>
				<tr>
					<td><a href="./ChangePassword.php">Change Password</a></td>
					<td><?php if($_SESSION["isAdmin"] == 't') echo "<a href=\"./Analytics.php\">Analytics</a>";?></td>
					<td><input class="btn btn-primary" type="submit" value="Update Changes"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</form>
	</div>
</body>



<?php
	function getInfo($item)
	{
		include("connect-db.php");
		$query = "SELECT " . $item . " FROM customers WHERE customerid = " . $_SESSION["customerid"];
		$result = pg_query($dbc, $query);
		return pg_fetch_row($result)[0];
	}
?>