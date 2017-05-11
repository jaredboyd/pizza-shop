<!DOCTYPE html>
<html>
	<head>
	<title>The Pizza Shop</title>
	<link rel="stylesheet" type="text/css" href="displayOrders.css"/>
	</head>
<?php
include 'dbconnection.php';

if (isset($_GET["oid"])) {
	$oid = $_GET["oid"];
} else {
	$oid = null;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$q = "UPDATE orders SET cookedDatetime = NOW() WHERE oid = $oid";

	$r = mysqli_query($dbc, $q);

	if ($r) {
		header('Location: displayOrders.php');
		exit;
	} else {
		echo mysqli_error($dbc);
	}

	mysqli_close($dbc);
}

?>

</html>
