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
	     		<h1>Register an account:</h1>
				
				<?php
				if ( isset($_GET["err"]) ) {
					echo "<div class=\"form-error\">";
					
					if ( $_GET["err"] == "dup_user" ) {
						echo "That username exists already!  Try another...";
					}
					
					elseif ( $_GET["err"] == "pass_match" ) {
						echo "Your passwords didn't match!  Please try again...";
					}
					
					elseif ( $_GET["err"] == "acc_wrong" ) {
						echo "That was not the right access code!  Please try again...";
					}
					
					else {
						echo "Ben only had one job!  Error code was \"".$_GET["err"]."\"";
					}
					
					echo "</div>";
				}
				?>
	   		
				<div class="login-form">
					<form action="regProc.php" method="post">
						<div class="login-row">Username: <input type="text" name="user"></div>
						<div class="login-row">Password: <input type="password" name="pass1"></div>
						<div class="login-row">Confirm Password: <input type="password" name="pass2"></div>
						<div class="login-row">Access Code: <input type="password" name="code"></div>
						<div class="login-row"><input type="submit" value="Submit"></div>
					</form>
				</div>
			</div>
	   </div>
	</body>
</html>