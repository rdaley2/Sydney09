<?php

	$dbhost = "66.147.242.186";
	$dbuser = "urcscon3_sydney";
	$dbpass = "coffee1N";
	$dbname = "urcscon3_sydney";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	$counter = (int) $_POST['counter'];
	

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

	$query = "UPDATE survey SET ";
	$query .= "fname = '{$fname}', ";
	$query .= "lname = '{$lname}', ";
	$query .= "email = '{$email}', ";
	$query .= "pnumber = '{$pnumber}', ";
	$query .= "like_kit = '{$like_kit}', ";
	$query .= "like_poc = '{$like_poc}', ";
	$query .= "fav = '{$fav}', ";
	$query .= "message = '{$message}' ";
	$query .= "WHERE counter = {$counter}";

	$result = mysqli_query($connection, $query);
?>

<?php
	if ($result) {
?>
   	 <div>
        The record <?php echo $_POST['counter'] ?> has been updated.
    </div>

<?php

	} else {
		
	    die("Database query failed. ");
	    
	}
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
	     		<h1>Administration Update Page</h1>
			<h2>Account # <?php echo $counter ?>, (<?php echo $fname ?> <?php echo $lname ?>) has been updated!</h2>
	   		</div>
	   		<div class="mainbox2">
		   		<ul class="formformat">
		   			<li>
					   <form method="post" action="admin.php">
					   	<input type="submit" value="Back to Admin Page" />
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