<?php
	// 1. Create a database connection
	$dbhost = "66.147.242.186";
	$dbuser = "urcscon3_sydney";
	$dbpass = "coffee1N";
	$dbname = "urcscon3_sydney";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// 2. Perform database query
	$query  = "SELECT * ";
	$query .= "FROM survey ";


	$result = $connection->query($query);

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Administration Page</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/grid.css">
	</head>

	<body>
		<div class="container">
			<h1>Administration Page</h1>
			<div class="box2">
				<div class="formformat">
					<h2>Pokey Survey Results</h2>
					<table border>
						<tr>
							<td> ID# </td>
							<td> First Name </td>
							<td> Last Name </td>
							<td> Email </td>
							<td> Phone# </td>
						</tr>

<?php
	// 3. Use returned data (if any)
	while($row = mysqli_fetch_assoc($result)) {
		// output data from each row
?>
						<tr>
							<td><?php echo $row["counter"]; ?></td>
							<td><?php echo $row["fname"]; ?></td>
							<td><?php echo $row["lname"]; ?></td>
							<td><?php echo $row["email"]; ?></td>
							<td><?php echo $row["pnumber"]; ?></td>
							<td>
								<form method="post" action="view.php">
									<button type="submit" name="counter" value=<?php echo $row["counter"]; ?>>View & Edit</button> 
								</form>
							</td>
						</tr>
<?php } ?>	
					</table>
				</div>
			</div>
			<div class="mainbox">
				<div class="formformat">
					<form method="post" action="delete.php">
						<ul>
							<li>
								<label>Select an account #: </label>
       							<input type="number" name="id" />
							</li>
							<li>
								<input type="submit" value="DELETE" />
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
	// 4. Release returned data
	mysqli_free_result($result);

	// 5. Close database connection
	mysqli_close($connection);
?>
