<?php

// SET ACCESS CODE HERE!
define("ACC_CODE", "coffee");

// Check for correct access code
if ( $_POST["code"] != ACC_CODE ) {
	header("Location: register.php?err=acc_wrong");
	die();
}

// Check for mismatched passwords
if ( $_POST["pass1"] != $_POST["pass2"] ) {
	header("Location: register.php?err=pass_match");
	die();
}

require "../includes/database.php";

// Check for duplicate username
$result = mysqli_query($db, "SELECT ID FROM users WHERE username = '".escape($_POST["user"])."';");
if ( mysqli_num_rows($result) > 0 ) {
	header("Location: register.php?err=dup_user");
	die();
}
mysqli_free_result($result);

// We're still here?  Good.  Let's create the account.
mysqli_query($db, "INSERT INTO users (username, password) VALUES ('".escape($_POST["user"])."', '".password_hash($_POST["pass1"], PASSWORD_DEFAULT)."');");

mysqli_close($db);
header("Location: login.php?err=reg_ok");

?>