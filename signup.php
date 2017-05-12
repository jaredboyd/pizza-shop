<!DOCTYPE html>
<html>
	<head>
		<title>The Pizza Shop</title>
		<link rel="stylesheet" type="text/css" href="order.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    	<script>if (!window.jQuery) { document.write('<script src="js/jquery-1.12.2.min.js"><\/script>'); }
		</script>
		<script type="text/javascript" src="signup.js"></script>
	</head>

<?php
include 'dbconnection.php';

if (isset($_POST["fName"])) {
	$fName = $_POST["fName"];
} else {
	$fName = null;
}
if (isset($_POST["lName"])) {
	$lName = $_POST["lName"];
} else {
	$lName = null;
}
if (isset($_POST["email"])) {
	$email = $_POST["email"];
} else {
	$email = null;
}
if (isset($_POST["password"])) {
	$password = $_POST["password"];
} else {
	$password = null;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//Check to see if email is already being used in database
	$q1 = "SELECT email FROM customer WHERE email = '$email';";
	$r1 = mysqli_query($dbc, $q1);

	if ($r1) {
		//If email is already being used
		if(mysqli_num_rows($r1) != 0) {
			echo '
				<body>
				<div class="box" style="text-align: center;">
					<h2>Register An Account</h2>

					<form action="signup.php" method="post">
						<input type="text" class="inputtext" id="fName" name="fName" placeholder="First name" value="'.$fName.'"> <br>
						<input type="text" class="inputtext" id="lName" name="lName" placeholder="Last name" value="'.$lName.'"> <br>			
						<input type="text" class="inputtext" id="email" name="email" placeholder="Email address" value="'.$email.'"> <br>
						<input type="password" class="inputtext" id="password" name="password" placeholder="Password"> <br>
						<input type="password" class="inputtext" id="repassword" placeholder="Re-type password"> <br>

						<input type="submit" button id="button" value="Sign Up">
					</form>
						<p class="validity" style="display:block;">This email account is already being used</p>
						<p class="validity" id="firstError">First name must contain no spaces or symbols, and be no longer than 20 characters in length</p>
						<p class="validity" id="lastError">Last name must contain no spaces or symbols, and be no longer than 20 characters in length</p>
						<p class="validity" id="usernameError">Username must be no longer than 20 characters in length, and may contain alphanumeric characters and the following symbols _!@-</p>
						<p class="validity" id="passwordError">Password must be between 6 and 20 characters, and may contain alphanumeric characters and the following symbols _!@-</p>
						<p class="validity" id="repasswordError">Passwords do not match</p>
						<p class="validity" id="emailError">Invalid email address</p>
				</div>
				</body>
				';
		//If email is available
		} else {
			$q = "INSERT INTO customer
			(fName, lName, email, password)
			VALUES ('$fName', '$lName', '$email', '$password');";

			$r = mysqli_query($dbc, $q);

			if ($r) {

			} else {
				echo mysqli_error($dbc);
			}

			mysqli_close($dbc);

			header('Location: index.php');
		}
	} else {
		echo mysqli_error($dbc);
	}
	mysqli_close($dbc);

} else {
	echo '
	<body>
	<div class="box" style="text-align: center;">
		<h2>Register An Account</h2>

		<form action="signup.php" method="post">
			<input type="text" class="inputtext" id="fName" name="fName" placeholder="First name"> <br>
			<input type="text" class="inputtext" id="lName" name="lName" placeholder="Last name"> <br>			
			<input type="text" class="inputtext" id="email" name="email" placeholder="Email address"> <br>
			<input type="password" class="inputtext" id="password" name="password" placeholder="Password"> <br>
			<input type="password" class="inputtext" id="repassword" placeholder="Re-type password"> <br>

			<input type="submit" button id="button" value="Sign Up">
		</form>
			<p class="validity" id="firstError">First name must contain no spaces or symbols, and be no longer than 20 characters in length</p>
			<p class="validity" id="lastError">Last name must contain no spaces or symbols, and be no longer than 20 characters in length</p>
			<p class="validity" id="usernameError">Username must be no longer than 20 characters in length, and may contain alphanumeric characters and the following symbols _!@-</p>
			<p class="validity" id="passwordError">Password must be between 6 and 20 characters, and may contain alphanumeric characters and the following symbols _!@-</p>
			<p class="validity" id="repasswordError">Passwords do not match</p>
			<p class="validity" id="emailError">Invalid email address</p>
	</div>
	</body>
	';
}
?>
</html>



