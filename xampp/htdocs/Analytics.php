<?php
	session_start();
	include 'NavBar.php';
	include("connect-db.php");
	include "passwordHashing.php";
	
	echo "<div class=\"container\">";
	
	$query = "SELECT SUM(quantity) FROM orders";
	$sum = pg_fetch_result(pg_query($dbc, $query), 0);
	echo "Inventory Sold: " . $sum;
	
	
	$today = date("Y-m-d");
	
	//amountSoldToday * (sellingPrice - vendorPrice)
	$query = "SELECT SUM(o.quantity*(p.sellingPrice-p.vendorPrice)) 
		FROM cart AS c, orders AS o, products as P 
		WHERE c.cartid = o.cartid 
		AND o.productid = p.productid 
		AND \"transactionComplete\" = 't' 
		AND c.timeplaced = '" . $today . "'";
	$profitToday = pg_fetch_result(pg_query($dbc, $query), 0);
	
	echo "<br>Online Profit Today: " . round($profitToday,2);
	
	
	$oneMonthAgo = '2016-11-04';//Make work
	$query = "SELECT SUM(o.quantity*(p.sellingPrice-p.vendorPrice)) 
		FROM cart AS c, orders AS o, products as P 
		WHERE c.cartid = o.cartid 
		AND o.productid = p.productid 
		AND \"transactionComplete\" = 't'
		AND (DATE '" . $oneMonthAgo . "', DATE '" . $today . "') OVERLAPS
       (c.timeplaced, c.timeplaced)";
	$profitMonth = pg_fetch_result(pg_query($dbc, $query), 0);
	
	echo "<br>Online Profit This Month: " . round($profitMonth,2);
	
	
	
	$query = "SELECT SUM(o.quantity*(p.sellingPrice-p.vendorPrice)) 
		FROM cart AS c, orders AS o, products as P 
		WHERE c.cartid = o.cartid 
		AND o.productid = p.productid 
		AND \"transactionComplete\" = 't'";
	$profit = pg_fetch_result(pg_query($dbc, $query), 0);
	
	echo "<br>Total Online Profit: " . round($profit,2);
	
	echo "</div>";
?>