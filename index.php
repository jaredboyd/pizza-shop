<!DOCTYPE html>
<html>
<head>
	<title>The Pizza Shop</title>
	<link rel="stylesheet" type="text/css" href="order.css"/>
</head>
<?php

include 'login.php';

if (isset($_SESSION['email'])) {
	header("Location: order.php");
}

?>

<body>
	<div class="box">
		<h1>The Pizza Shop Log In</h1>
		<div style="text-align: center;">
			<form method="post" action="">
				<input type="text" id="email" name="email" placeholder="Email"></br>
				<input type="password" id="password" name="password" placeholder="Password"></br>

				<input type="submit" name="submit" value="Log In">
				<p style="color: red;"><?php echo $error; ?></p>
				<p style="text-decoration: none;"><a href="signup.php">Sign Up</a></p>
			</form>
		</div>
	</div>
</body>
</html>