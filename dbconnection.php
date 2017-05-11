<?php
	define("DB_HOST", "localhost");
	define("DB_USER", "test");
	define("DB_PASSWORD", "test");
	define("DB_NAME", "pizza_shop");

	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
?>