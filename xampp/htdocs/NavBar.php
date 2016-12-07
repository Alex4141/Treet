<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="All of us">

    <title>Treet</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap-4.0.0-alpha.5-dist\css\bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="./res.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
		<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
			<div class="row">
				<ul class="nav navbar-nav">
					<li class="col-xs-2">
						<!-- Leads to account if logged in, signup otherwise -->
						<a href="./<?php if(isset($_SESSION["email"])) echo "account"; else echo "signup";?>.php">Hello<?php echo getUser()?>!</a>
					</li>
					<li class="col-xs-2">
						<a href="./index.php">Home</a>
					</li>
					<li class="col-xs-2">
						<a href="./index.php#About">About</a>
					</li>
					<li class="col-xs-2">
						<a href="./index.php#Shops">Shops</a>
					</li>
					<li class="col-xs-2">
						<?php echo userPrompt() ?>
					</li>
					<li class="col-xs-2">
						<?php echo signupPrompt() ?>
					</li>
				</ul>
			</div>
				<!-- /.navbar-collapse -->
			<!-- /.container-fluid -->
		</nav>
	<br>
	<br>
	<br>
</body>


<?php
	function getUser()
	{
		if (isset($_SESSION["firstname"]))
			return ", " . $_SESSION["firstname"];
		else
			return "";
	}
	
	function userPrompt()
	{
		if (isset($_SESSION["email"]))
			return "<a href=\"./LogOut.php\">Log Out</a>";
		else
			return "<a href=\"./Login.php\">Log In</a>";
	}
	
	function signupPrompt()
	{
		if (isset($_SESSION["email"]))
			if ($_SESSION["isAdmin"] == 't')
				return "<a href=\"./admin.php\">Admin</a>";
			else
				return "<a href=\"./account.php\">Account</a>";
		else
			return "<a href=\"./signup.php\">Sign Up</a>";
	}
?>

