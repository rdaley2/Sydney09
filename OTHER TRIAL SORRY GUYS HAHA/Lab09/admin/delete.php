<?php

	$dbhost = "66.147.242.186";
	$dbuser = "urcscon3_sydney";
	$dbpass = "coffee1N";
	$dbname = "urcscon3_sydney";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	$counter = (int) $_POST['id'];
if (isset($counter)) {
	echo "string";
	echo $counter;
}else{
		echo "nooo";
	echo $counter;
}

	$query = "DELETE FROM survey ";
	$query .= "WHERE counter = {$counter} ";
	$query .= "LIMIT 1";

	$result = mysqli_query($connection, $query);
?>

<?php
		if ($result) {
?>
    <div>
        The record <?php echo $counter ?> has been deleted.
    </div>

<?php

	} else {
	    die("Database query failed.");
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
	     		<h1>DELETE ACCOUNT</h1>
			<h2>Account # <?php echo $counter ?> has been DELETED!</h2>
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