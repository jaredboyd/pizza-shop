<!DOCTYPE html>
<html>
	<head>
		<title>The Pizza Shop</title>
		<link rel="stylesheet" type="text/css" href="order.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    	<script>if (!window.jQuery) { document.write('<script src="js/jquery-1.12.2.min.js"><\/script>'); }
		</script>
		<script type="text/javascript" src="order.js"></script>
	</head>

<?php
include 'dbconnection.php';
include 'session.php';

$checkEmail = $_SESSION['email'];
$query = mysqli_query($dbc, "SELECT fName, lName FROM customer WHERE email = '$checkEmail'");
$dbRow = mysqli_fetch_array($query);
$fName = $dbRow['fName'];
$lName = $dbRow['lName'];

if (isset($_POST["size"])) {
	$size = $_POST["size"];
} else {
	$size = null;
}
if (isset($_POST["sauce"])) {
	$sauce = $_POST["sauce"];
} else {
	$sauce = null;
}
if (isset($_POST["cheese"])) {
	$cheese = $_POST["cheese"];
} else {
	$cheese = null;
}
if (isset($_POST["toppings"])) {
	$toppingsArray = $_POST["toppings"];
	$toppings = implode(", ", $toppingsArray);
} else {
	$toppingsArray = null;
	$toppings = "No Toppings";
}
if (isset($_POST["orderType"])) {
	$orderType = $_POST["orderType"];
} else {
	$orderType = null;
}

//if the submitted form is valid
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$total = 0.0;
	$waitTime = 0;

	//set base pizza price based on pizza size
	if ($size === 'small') {
		$total += 8;
	}
	if ($size === 'medium') {
		$total += 10;
	}
	if ($size === 'large') {
		$total += 12;
	}

	//add price of toppings to total
	$total += sizeof($toppingsArray) * 1.5;
	//total price string with correct formatting
	$formattedTotal = number_format((float)$total, 2, '.', '');

	$q = "INSERT INTO orders
			(fName, lName, size, sauce, cheese, toppings, orderType, total)
			VALUES ('$fName', '$lName', '$size', '$sauce', '$cheese', '$toppings', '$orderType', '$total');";

	$q2 = "SELECT * FROM `orders` WHERE 1";

	$r = mysqli_query($dbc, $q);

	if ($r) {
		//wait time = 5 minutes per order with a base time of 10 minutes
		$waitTime = (mysqli_num_rows(mysqli_query($dbc, $q2)) * 5) + 5;
	} else {
		echo mysqli_error($dbc);
	}

	mysqli_close($dbc);

	echo '
	<p style="text-align:right; padding-right:50px; padding-top:10px; padding-bottom:0px; margin:0;"><a href="logout.php">Log Out</a></p>
	<p style="text-align: center; padding-top: 80px;">Your total for this order is $' . $formattedTotal . ' and it should be ready in ' . $waitTime . ' minutes</p>';

} else {
echo'
<body>
	<p style="text-align:right; padding-right:50px; padding-top:10px; padding-bottom:0px; margin:0;"><a href="logout.php">Log Out</a></p>
	<div class="box">
		<h1>The Pizza Shop</h1>

		<form action="order.php" method="post">

			<div id="topRow">
				<div class="top">
					<h3>Pizza Size</h3>
					<select name="size" id="size">
						<option value="small">Small - $8.00</option>
						<option value="medium" selected>Medium - $10.00</option>
						<option value="large">Large - $12.00</option>
					</select>
				</div>

				<div class="top">
					<h3>Sauce</h3>
					<select name="sauce" id="sauce">
						<option value="none">No Sauce</option>
						<option value="light">Light Sauce</option>
						<option value="normal" selected>Normal Sauce</option>
						<option value="extra">Extra Sauce</option>
					</select>
				</div>

				<div class="top">
					<h3>Cheese</h3>
					<select name="cheese" id="cheese">
						<option value="none">No Cheese</option>
						<option value="light">Light Cheese</option>
						<option value="normal" selected>Normal Cheese</option>
						<option value="extra">Extra Cheese</option>
					</select>
				</div>
			</div>

			<div id="centerToppings">
				<div id="toppings">
					<h3>Toppings</h3>
					<p style="color: gray; font-size: .8em">Additional $1.50 per topping</p>
					<input type="checkbox" name="toppings[]" value="pepperoni">Pepperoni</br>
					<input type="checkbox" name="toppings[]" value="sausage">Sausage</br>
					<input type="checkbox" name="toppings[]" value="bacon">Bacon</br>
					<input type="checkbox" name="toppings[]" value="greenPeppers">Green Peppers</br>
					<input type="checkbox" name="toppings[]" value="blackOlives">Black Olives</br>
					<input type="checkbox" name="toppings[]" value="mushrooms">Mushrooms</br>
					<input type="checkbox" name="toppings[]" value="onions">Onions</br>
				
					<h3>Order Type</h3>
					<input type="radio" name="orderType" value="carryout" checked="checked">Carryout</br>
					<input type="radio" name="orderType" value="delivery">Delivery</br>

					<input type="submit" button id="button" value="Submit Order">
				</div>
			</div> 
		</form>

		<p class="validity" style="text-align: center;" id="fNameError">Invalid first name</p>
		<p class="validity" style="text-align: center;" id="lNameError">Invalid last name</p>
	</div>
	';
}
?>