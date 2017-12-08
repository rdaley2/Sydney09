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
		<link rel="stylesheet" href="../css/nav.css">
	</head>
	<body>
		<div class="topnav" id="myTopnav">
		  <a href="../assignment09.html">Home</a>
		  <a href="#">Contact</a>
		  <a href="admin/login.php">Admin</a>
		</div>
	   
	    <div class="container">
	   		<div class="formformat">
	     		<h1>Admin Login:</h1>
				
				<?php
				if ( isset($_GET["err"]) ) {
					echo "<div class=\"form-error\">";
					
					if ( $_GET["err"] == "bad_user" ) {
						echo "Incorrect username or password!  Please try again...";
					}
					
					elseif ( $_GET["err"] == "reg_ok" ) {
						echo "Please log in with your new account.";
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
					
					<p>
						<a href="register.php">Register for an account</a>
					</p>
				</div>
			</div>
	   </div>
	</body>
</html>