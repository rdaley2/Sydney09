<?php
require "../includes/checkAuth.php";
require "../includes/database.php";

if ( isset($_POST["familiarPocky"]) && isset($_POST["familiarKitkat"]) ) {
	$familiar = "both";
}
elseif ( ! isset($_POST["familiarPocky"]) && ! isset($_POST["familiarKitkat"]) ) {
	$familiar = "neither";
}
elseif ( isset($_POST["familiarPocky"]) ) {
	$familiar = "pocky";
}
else {
	$familiar = "kitkat";
}

if ( isset($_POST["triedPocky"]) && isset($_POST["triedKitkat"]) ) {
	$tried = "both";
}
elseif ( ! isset($_POST["triedPocky"]) && ! isset($_POST["triedKitkat"]) ) {
	$tried = "neither";
}
elseif ( isset($_POST["triedPocky"]) ) {
	$tried = "pocky";
}
else {
	$tried = "kitkat";
}

mysqli_query($db, "UPDATE survey9 SET firstName = '".escape($_POST["fname"])."', lastName = '".escape($_POST["lname"])."', email = '".escape($_POST["email"])."', cellNum = '".escape($_POST["pnumber"])."', familiar = '$familiar', tried = '$tried', prefer = '".escape($_POST["preference"])."', why = '".escape($_POST["message"])."' WHERE ID = '".$_POST["id"]."';");

mysqli_close($db);
header("Location: view.php?err=edit_ok");
?>