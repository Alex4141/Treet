<?php
	$dbc = pg_connect("dbname=TreetDB user=postgres password=marist ");
	$stat = pg_connection_status($dbc);
	if ($stat === PGSQL_CONNECTION_OK) {
		echo 'deez nutz';
	} else {
		echo 'deez are not dee nutz ur lookin 4';
	}
?>