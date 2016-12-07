<?php
	session_start();
	include 'NavBar.php';
?>

<body>
	<div class="container">
		<form action="CreateUser.php" method="post">
			<table class="table">
				<tr><td style="text-align: left">First Name: </td> <td style="text-align: left">		<input style="width:40%" class="controls form-control" type="text" name="firstname" id="firstname"></td></tr>
				<tr><td style="text-align: left">Last Name: </td> <td style="text-align: left">			<input style="width:40%" class="controls form-control" type="text" name="lastname" id="lastname"></td></tr>
				<tr><td style="text-align: left">Email: </td> <td style="text-align: left">				<input style="width:40%" class="controls form-control" type="text" name="email" id="email"></td></tr>
				<tr><td style="text-align: left">Street Address: </td> <td style="text-align: left">	<input style="width:40%" class="controls form-control" type="text" name="address" id="address"></td></tr>
				<tr><td style="text-align: left">Zip Code: </td> <td style="text-align: left">			<input style="width:40%" class="controls form-control" type="number" name="zip" id="zip"></td></tr>
				<tr><td style="text-align: left">Password: </td> <td style="text-align: left">			<input style="width:40%" class="controls form-control" type="password" name="password" id="password"></td></tr>
				<tr><td style="text-align: left">Confirm Password: </td> <td style="text-align: left">	<input style="width:40%" class="controls form-control" type="password" name="confirmPassword" id="confirmPassword"></td></tr>
				<tr><td></td><td style="text-align: left"><input type="submit" class="btn btn-primary" value="Sign Up"></td></tr>
			</table>
		</form>
	</div>
</body>