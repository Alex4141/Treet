<?php
	session_start();
	include 'NavBar.php';
	
	if(!isset($_SESSION["email"]))
		header("Location: ./index.php");
?>


<body>
	<div class="container">
		<form action="UpdatePassword.php" method="post">
			<table class="table">
				<tr><td style="text-align: left">Current Password: </td> <td style="text-align: left"> <input style="width:40%" class="controls form-control" type="password" name="oldPassword" id="oldPassword"></td></tr>
				<tr><td style="text-align: left">New Password: </td> <td style="text-align: left"> <input style="width:40%" class="controls form-control" type="password" name="newPassword" id="newPassword"></td></tr>
				<tr><td style="text-align: left">Confirm Password: </td> <td style="text-align: left"> <input style="width:40%" class="controls form-control" type="password" name="confirmPassword" id="confirmPassword"></td></tr>
				<tr><td></td><td style="text-align: left"><input type="submit" class="btn btn-primary" value="Change Password"></td></tr>
			</table>
		</form>
	</div>
</body>