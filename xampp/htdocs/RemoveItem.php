<?php 
	include("connect-db.php");
	session_start();
	
	$query = "SELECT o.cartid, o.productid, o.quantity
			FROM products AS p, orders AS o, cart AS c
			WHERE c.customerid = " . $_SESSION['customerid'] . "
			AND c.cartid = o.cartid
			AND o.productid = p.productid
			AND \"transactionComplete\" = 'f'
			ORDER BY p.productname";
		
	$result = pg_query($dbc, $query);
	
	
	//TODO: Get rownum
	$rowNum = $_POST['deleteButton'];
	
	
	$row = pg_fetch_row($result, $rowNum);
	
	$query = "UPDATE products SET stock = stock + " . $row[2] . "WHERE productid = " . $row[1];
	pg_query($dbc, $query);
	
	$query = "DELETE FROM orders WHERE cartid = " . $row[0] . " AND productid = " . $row[1];
	pg_query($dbc, $query);
	
	header("Location: ./Checkout.php");
?>