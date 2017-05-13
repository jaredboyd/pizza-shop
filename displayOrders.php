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


/*-----Pagination-----*/
//Number of records per page
$displayRecords = 10;

//Determine number of pages
if (isset($_GET['p']) && is_numeric($_GET['p'])) {
	//Already determined
	$pages = $_GET['p'];
} else {
	//Need to determine
	$numRecordsQuery = "SELECT Count(*) FROM orders";
	$numRecordsResult = mysqli_query($dbc, $numRecordsQuery);
	$row = mysqli_fetch_array($numRecordsResult, MYSQLI_NUM);
	$records = $row[0];

	if($records > $displayRecords) {
		$pages = ceil($records/$displayRecords);
	} else {
		$pages = 1;
	}
}

//Determine starting point in database
if(isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}


$q = "SELECT * FROM orders ORDER BY oid DESC LIMIT $start, $displayRecords";;

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

//Alternate background colors of the table
$bg = 'lightgray';

	if ($r) {
		while ($row = mysqli_fetch_array($r)) {
			if($bg == 'lightgray') {
				$bg = 'white';
			} else {
				$bg = 'lightgray';
			}
			echo '
				<tr bgcolor="' . $bg . '">
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

<?php
//Page navigation
if($pages > 1) {
	echo '<br /><p>';

	//Determine which page is being viewed
	$currentPage = ($start/$displayRecords) + 1;

	//Link to previous page
	if($currentPage != 1) {
		echo '<a href="displayOrders.php?s=' . ($start - $displayRecords) . '&p=' . $pages . '">Previous</a> ';
	}

	//Numeric links
	for($i = 1; $i <= $pages; $i++) {
		if($i != $currentPage) {
			echo '<a href="displayOrders.php?s=' . (($displayRecords * ($i - 1))) . '&p=' . $pages . '">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	}

	//Link to next page
	if($currentPage != $pages) {
		echo '<a href="displayOrders.php?s=' . ($start + $displayRecords) . '&p=' . $pages . '">Next</a>';
	}

}

?>
</body>
</html>

