<?php
require "includes/database.php";

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

mysqli_query($db, "INSERT INTO survey9 (firstName, lastName, email, cellNum, familiar, tried, prefer, why) VALUES ('".escape($_POST["fname"])."', '".escape($_POST["lname"])."', '".escape($_POST["email"])."', '".escape($_POST["pnumber"])."', '".$familiar."', '".$tried."', '".escape($_POST["preference"])."', '".escape($_POST["message"])."');");

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CSC174 Assignment 09 - Sydney</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/grid.css">
	</head>
	<body>
	   <div class="container2">
	   		<div class="thanksbox">
	     		<h1>Thank you, <?php echo $_POST["fname"]; ?> for participating in our survey!</h1>
	   		</div>
	   </div>
	</body>
</html>

<?php
	mysqli_close($connection);
?>
