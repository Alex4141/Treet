
<?php
	session_start();
	if(!isset($_SESSION["email"]))
		header("Location: ./index.php");
	include("connect-db.php");
	if (pg_connection_status($dbc) == 0)
		echo"Database is connected!";
	pg_query($dbc, "INSERT INTO cart (customerid) VALUES (" . $_SESSION["customerid"] . ")");
	$_SESSION["cartid"] = pg_fetch_result(pg_query($dbc, "SELECT MAX(cartid) FROM cart"), 0);
	
	
	//Hershey
	if(!empty($_POST['hersheyQuantity']))
	{
		if($_POST['hersheyQuantity'] > 0)
			addProduct(0, $_POST['hersheyQuantity'], $dbc, $_SESSION["cartid"]);
			updateStock(0, $_POST['hersheyQuantity'], $dbc);
	}
	if(!empty($_POST['reesesQuantity']))
	{
		if($_POST['reesesQuantity'] > 0)
			addProduct(1, $_POST['reesesQuantity'], $dbc, $_SESSION["cartid"]);
			updateStock(1, $_POST['reesesQuantity'], $dbc);
	}
	if(!empty($_POST['almondJoyQuantity']))
	{
		if($_POST['almondJoyQuantity'] > 0)
			addProduct(2, $_POST['almondJoyQuantity'], $dbc, $_SESSION["cartid"]);
			updateStock(2, $_POST['almondJoyQuantity'], $dbc);
	}
	
	
	//Mars
	if(!empty($_POST['MMQuantity']))
	{
		if($_POST['MMQuantity'] > 0)
			addProduct(3, $_POST['MMQuantity'], $dbc, $_SESSION["cartid"]);
			updateStock(3, $_POST['MMQuantity'], $dbc);
	}
	if(!empty($_POST['SkittlesQuantity']))
	{
		if($_POST['SkittlesQuantity'] > 0)
			addProduct(4, $_POST['SkittlesQuantity'], $dbc, $_SESSION["cartid"]);
			updateStock(4, $_POST['SkittlesQuantity'], $dbc);
	}
	if(!empty($_POST['StarburstQuantity']))
	{
		if($_POST['StarburstQuantity'] > 0)
			addProduct(5, $_POST['StarburstQuantity'], $dbc, $_SESSION["cartid"]);
			updateStock(5, $_POST['StarburstQuantity'], $dbc);
	}
	
	
	//Nestle
	if(!empty($_POST['NerdsQuantity']))
	{
		if($_POST['NerdsQuantity'] > 0)
			addProduct(6, $_POST['NerdsQuantity'], $dbc, $_SESSION["cartid"]);
			updateStock(6, $_POST['NerdsQuantity'], $dbc);
	}
	if(!empty($_POST['CrunchQuantity']))
	{
		if($_POST['CrunchQuantity'] > 0)
			addProduct(7, $_POST['CrunchQuantity'], $dbc, $_SESSION["cartid"]);
			updateStock(7, $_POST['CrunchQuantity'], $dbc);
	}
	if(!empty($_POST['LaffyTaffyQuantity']))
	{
		if($_POST['LaffyTaffyQuantity'] > 0)
			addProduct(8, $_POST['LaffyTaffyQuantity'], $dbc, $_SESSION["cartid"]);
			updateStock(8, $_POST['LaffyTaffyQuantity'], $dbc);
	}
	
	header("Location: ./Checkout.php");

	
	function addProduct($productid, $quantity, $dbc, $cartid)
	{
		$query = "INSERT INTO orders (cartid, productid, quantity) VALUES ($cartid, $productid, $quantity)";
		pg_query($query);
		echo "<br> added thingy";
	}
	
	function updateStock($productid, $quantity, $dbc)
	{
		$query = "UPDATE products SET stock = stock - $quantity WHERE productid = $productid";
		pg_query($query);
	}
	
	
	
	
	
	
	
?>