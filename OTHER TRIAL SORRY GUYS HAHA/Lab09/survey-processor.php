<?php
//creating a database connection

	$dbhost = "66.147.242.186";
	$dbuser = "urcscon3_sydney";
	$dbpass = "coffee1N";
	$dbname = "urcscon3_sydney";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//HTML form values in $_POST
	
	$blanck = " ";	
	$fname = Trim(stripslashes($_POST['fname']));
	$lname = Trim(stripslashes($_POST['lname']));
	$email = Trim(stripslashes($_POST['email']));
	$pnumber = Trim(stripslashes($_POST['pnumber']));
	if (empty($_POST['kitkat'])) {
			$like_kit = $blanck;
		}else{
			$like_kit = Trim(stripcslashes($_POST['kitkat']));
		}
	if (empty($_POST['pocky'])) {
			$like_poc = $blanck;
		}else{
			$like_poc = Trim(stripcslashes($_POST['pocky']));
		}
	if (empty($_POST['preference'])) {
			$fav = $blanck;
		}else{
			$fav = Trim(stripcslashes($_POST['preference']));

		}	
	$message = Trim(stripcslashes($_POST['message']));

//escape all strings
	$fname = mysqli_real_escape_string($connection, $fname);
	$lname = mysqli_real_escape_string($connection, $lname);
	$email = mysqli_real_escape_string($connection, $email);
	$pnumber = mysqli_real_escape_string($connection, $pnumber);
	$like_kit = mysqli_real_escape_string($connection, $like_kit);
	$like_poc = mysqli_real_escape_string($connection, $like_poc);
	$fav = mysqli_real_escape_string($connection, $fav);
	$message = mysqli_real_escape_string($connection, $message);


//databse query
	$query  = "INSERT INTO survey (";
	$query .= "  fname, lname, email, pnumber, like_poc, like_kit, fav, message";
	$query .= ") VALUES (";
	$query .= "  '{$fname}', '{$lname}','{$email}', '{$pnumber}', '{$like_kit}', '{$like_poc}', '{$fav}', '{$message}'";
	$query .= ")";

	$result = mysqli_query($connection, $query);



?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CSC174 Assignment 08- Sdyney</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/grid.css">
	</head>
	<body>
	   <div class="container2">
	   		<div class="thanksbox">
	     		<h1> Thank you, <?php echo $_POST["fname"]; ?> for participating in our survey!</h1>
	   		</div>
	   		<div class="mainbox2">
		   		<ul class="formformat">
		   			<li>
					   <form method="post" action="assignment08.html">
					   	<input type="submit" value="Back to Survey" />
					   </form>
					</li>
				</ul>
			</div>
	   </div>
	</body>
</html>

<?php
	mysqli_close($connection);
?>
