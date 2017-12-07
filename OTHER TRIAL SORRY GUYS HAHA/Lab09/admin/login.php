<?php

session_start();

// If already logged in, redirect to view.php
if ( isset($_SESSION["user"]) ) {
	header("Location: view.php");
	die();
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CSC174 Assignment 09 - Sydney</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/styles.css">
		<link rel="stylesheet" href="../css/grid.css">
	</head>
	<body>
	   <div class="container2">
	   		<div class="thanksbox">
	     		<h1>Admin Login:</h1>
				
				<?php
				if ( isset($_GET["err"]) ) {
					echo "<div class=\"form-error\">";
					
					if ( $_GET["err"] == "bad_user" ) {
						echo "Incorrect username or password!  Please try again...";
					}
					
					else {
						echo "Ben only had one job!  Error code was \"".$_GET["err"]."\"";
					}
					
					echo "</div>";
				}
				?>
	   		
				<div class="login-form">
					<form action="loginProc.php" method="post">
						<div class="login-row">Username: <input type="text" name="user"></div>
						<div class="login-row">Password: <input type="password" name="pass"></div>
						<div class="login-row"><input type="submit" value="Go!"></div>
					</form>
				</div>
				
				<p>
					<a href="register.php">Register for an account</a>
				</p>
			</div>
	   </div>
	</body>
</html>