<?php

session_start();

$checkEmail = $_SESSION['email'];
$q = mysqli_query($dbc, "SELECT email FROM customer WHERE email = '$checkEmail'");
$row = mysqli_fetch_array($q);
$login_session = $row['email'];

if (!isset($login_session)) {
	mysqli_close($dbc);
	header('Location: index.php');
}
?>