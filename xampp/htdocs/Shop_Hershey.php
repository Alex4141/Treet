<?php
	session_start();
	include 'NavBar.php';
?>

<body>
	<div class="container btn">
		<form action="CartInput.php" method="POST">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<h1>
						Hershey!
					</h1>
				</div>
				<div class="col-md-4">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<?php echo getPrices("Milk Chocolate") ?>
				</div>
				<div class="col-md-4">
					<?php echo getPrices("Reeses") ?>
				</div>
				<div class="col-md-4">
					<?php echo getPrices("AlmondJoy") ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<img src="img/hersheyAssets/Hershey_Hershey.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-4">
					<img src="img/hersheyAssets/Hershey_Reeses.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-4">
					<img src="img/hersheyAssets/Hershey_Almond_Joy.png" class="img-responsive" alt="">
				</div>
			</div>
			<div class="row">
				<div style="padding-left:3.7%" class="col-md-4">
					<input style="width:205px" type="number name="hersheyQuantity" min="0" max="10"> lbs.
				</div>
				<div style="padding-left:3.7%" class="col-md-4">
					<input style="width:205px" type="number" name="reesesQuantity" min="0" max="10"> lbs.
				</div>
				<div style="padding-left:3.7%" class="col-md-4">
					<input style="width:205px" type="number" name="almondJoyQuantity" min="0" max="10"> lbs.
				</div>
			</div>
			<br>
			<input class="btn btn-primary" type="submit" value=" <?php if(!isset($_SESSION["email"])) echo "Please Sign In\" disabled=\"disabled\""; else echo "Add to Cart\"";?>>
		</form>
	</div>
</body>

<?php
	function getPrices($candy)
	{
		include("connect-db.php");
		$query = "SELECT sellingprice FROM products WHERE productname = '$candy'";
		
		$result = pg_query($dbc, $query);
		$row = pg_fetch_row($result);
		return "Price: \$$row[0]/lb.";
	}
?>