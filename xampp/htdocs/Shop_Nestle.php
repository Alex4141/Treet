<?php
	session_start();
	include 'NavBar.php';
?>

<body>
	<div class="container btn">
		<form action="CartInput.php" method="post">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<h1>
						Nestle!
					</h1>
				</div>
				<div class="col-md-4">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<?php echo getPrices("Nerds") ?>
				</div>
				<div class="col-md-4">
					<?php echo getPrices("Crunch") ?>
				</div>
				<div class="col-md-4">
					<?php echo getPrices("Laffy Taffy") ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<img src="img/nestleAssets/Nestle_Nerds.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-4">
					<img src="img/nestleAssets/Nestle_Crunch.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-4">
					<img src="img/nestleAssets/Nestle_Goobers.png" class="img-responsive" alt="">
				</div>
			</div>
			<div class="row">
				<div style="padding-left:3.7%" class="col-md-4">
					<input style="width:205px" type="number name= "NerdsQuantity" min="0" max="10"> lbs.
				</div>
				<div style="padding-left:3.7%" class="col-md-4">
					<input style="width:205px" type="number name= "CrunchQuantity" min="0" max="10"> lbs.
				</div>
				<div style="padding-left:3.7%" class="col-md-4">
					<input style="width:205px" type="number name= "LaffyTaffyQuantity" min="0" max="10"> lbs.
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