<?php
	session_start();
	include 'NavBar.php';
	
	
?>

<body>
	
	
	<div class="container">
		<h1>
			Check Out
		</h1>
	</div>
	<div class="container btn">
	</div>
	<div class="container">
		<form action="RemoveItem.php" method="post">
			<input type="hidden" name="cartidfield">
			<input type="hidden" name="productidfield">
			<table class="table">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>Sub-total</th>
						<th>Remove Item</th>
					</tr>
				</thead>
			<?php
				getCartInfo();
			?>
				<tr>
					<td></td>
					<td></td>
					<td>$<?php echo getTotal(); ?></td>
					<td></td>
				</tr>
			</table>
		</form>
	</div>
	<!--Button-->
	<div class="container" style="padding-left:45%">
		<form action="completeTransaction.php" method="post">
			<input type="submit" class="btn btn-primary" value="Checkout">
		</form>
	</div>
</body>

<?php
	function getTotal()
	{
		include("connect-db.php");
		$query = "SELECT SUM(o.quantity*p.sellingprice) FROM cart AS c, orders AS o, products AS p WHERE c.cartid = o.cartid AND \"transactionComplete\" = 'f' AND o.productid = p.productid AND c.customerid = " . $_SESSION["customerid"];
		
		$result = pg_query($dbc, $query);
		$total = pg_fetch_result($result, 0);
		$total = round($total, 2);
		return $total;
	}
	function getCartInfo()
	{
		include("connect-db.php");
		$query = "SELECT p.productname, o.quantity, p.sellingprice*o.quantity
			FROM products AS p, orders AS o, cart AS c
			WHERE c.customerid = " . $_SESSION['customerid'] . "
			AND c.cartid = o.cartid
			AND o.productid = p.productid
			AND \"transactionComplete\" = 'f'
			ORDER BY p.productname";
		
		$result = pg_query($dbc, $query);
		
		$numRows = pg_num_rows($result);
		
		for ($i=0; $i<$numRows; $i++)
		{
			$row = pg_fetch_row($result, $i);
			echo "<tr class=\"active\">";
			$j = 0;
			foreach ($row as $cell)
			{
				echo "<td>";
				if($j == 2)
				{
					echo "\$".round($cell, 2);
				}
				else
				{
					echo $cell;
				}
				echo "</td>";
				$j++;
			}
			echo "<td><button type=\"submit\" class=\"btn btn-primary\" name=\"deleteButton\" value=\"".$i."\">Remove</button></td>";
			echo "</tr>";
		}
	}
?>