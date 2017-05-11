<!DOCTYPE html>
<html>
	<head>
		<title>The Pizza Shop</title>
		<link rel="stylesheet" type="text/css" href="displayOrders.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    	<script>if (!window.jQuery) { document.write('<script src="js/jquery-1.12.2.min.js"><\/script>'); }
		</script>
		<script type="text/javascript" src="displayOrders.js"></script>
	</head>
	<body>

<?php
include 'dbconnection.php';

$q = "SELECT * FROM orders WHERE 1";

$r = mysqli_query($dbc, $q);

?>
<div id="ordersTable">
<table>
	<tr class="header">
		<th align="left">Order Num</th>
		<th align="left">Name</th>
		<th align="left">Size</th>
		<th align="left">Sauce</th>
		<th align="left">Cheese</th>
		<th align="left">Toppings</th>
		<th align="left">Order Type</th>
		<th align="left">Total</th>
		<th align="left">Order Placed</th>
		<th align="left">Order Cooked</th>
		<th align="left">Picked Up/Delivered</th>
	</tr>
<?php
	if ($r) {
		while ($row = mysqli_fetch_array($r)) {
			echo '
				<tr>
					<td>'. $row["oid"] . '</td>
					<td>'. $row["fName"] . ' ' . $row["lName"] .'</td>
					<td>'. $row["size"] .'</td>
					<td>'. $row["sauce"] .'</td>
					<td>'. $row["cheese"] .'</td>
					<td>'. $row["toppings"] .'</td>
					<td>'. $row["orderType"] .'</td>
					<td>$'. number_format((float)$row["total"], 2, '.', '') .'</td>
					<td>'. $row["placementDatetime"] .'</td>';
					if($row["cookedDatetime"] != null) {
						echo '<td>'. $row["cookedDatetime"] . '</td>';
					} else {
						echo '<td><a href="orderCooked.php?oid=' . $row["oid"] . '">Cooked?</a></td>';
					}
					if($row["pickupDeliveryDatetime"] != null) {
						echo '<td>'. $row["pickupDeliveryDatetime"] . '</td>';
					} else {
						echo '<td><a href="orderPickedupDelivered.php?oid=' . $row["oid"] . '">Order complete?</a></td>';
					}
				'</tr>
			';
		}
	} else {
		echo mysqli_error($dbc);
	}

	mysqli_close($dbc);
?>
</table>
</div>
</body>
</html>

<?php

function Cooked() {

}

function pickedupDelivered() {

}

?>
