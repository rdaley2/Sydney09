<?php

session_start();
require "../includes/database.php";

$result = mysqli_query($db, "SELECT username, password FROM users WHERE username = '".escape($_POST["user"])."';");
if ( mysqli_num_rows($result) < 1 ) {
	header("Location: login.php?err=bad_user");
	mysqli_close($db);
	die();
}

$userData = mysqli_fetch_assoc($result);
if ( ! password_verify($_POST["pass"], $userData["password"]) ) {
	header("Location: login.php?err=bad_user");
	mysqli_close($db);
	die();
}

mysqli_free_result($result);
mysqli_close($db);

$_SESSION["user"] = $userData["username"];
header("Location: view.php");

?>