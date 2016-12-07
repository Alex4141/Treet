<?php
	session_start();
	include 'NavBar.php';
?>

<body>
	<form class="form-inline" action="Validate.php" method="post">
		<div class="container control-group">
			<table class="table">
				<tr><td style="text-align: left">Email: </td> <td style="text-align: left">				<input style="width:40%" class="controls form-control" type="text" name="email" id="email"></td></tr>
				<tr><td style="text-align: left">Password: </td> <td style="text-align: left">			<input style="width:40%" class="controls form-control" type="password" name="password" id="password"></td></tr>
				<tr><td></td><td><input type="submit" class="btn btn-primary" value="Log In"></td></tr>
			</table>
		</div>
	</form>
</body>