<?php

include 'dbconnection.php';

session_start();
$error = '';
if (isset($_POST['submit'])) {
	if (empty($_POST['email']) || empty($_POST['password'])) {
		$error = "Username or password is invalid";
	} else {

		$email = $_POST['email'];
		$password = $_POST['password'];

		$q = mysqli_query($dbc, "SELECT * FROM customer WHERE password = '$password' AND email = '$email'");
		$rows = mysqli_num_rows($q);
		if ($rows == 1) {
			$_SESSION['email'] = $email;
			header('Location: order.php');
		} else {
			$error = "Username or password is invalid";
		}
		mysqli_close($dbc);
	}
}
?>