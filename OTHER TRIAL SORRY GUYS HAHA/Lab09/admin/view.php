<?php

	$dbhost = "66.147.242.186";
	$dbuser = "urcscon3_sydney";
	$dbpass = "coffee1N";
	$dbname = "urcscon3_sydney";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	$counter = $_POST['counter'];

	$query  = "SELECT * ";
	$query .= "FROM survey ";
	$query .= "WHERE counter = {$counter} ";
	$query .= "LIMIT 1";

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


<?php
	// 3. Use returned data (if any)
	while($row = mysqli_fetch_assoc($result)) {
		// output data from each row
?>

	<body>
		<h1>Administration Update Page</h1>
		<div class="container">
			
			<h2>Updating Account # <?php echo $row['counter'] ?>, (<?php echo $row['fname'] ?> <?php echo $row['lname'] ?>)</h2>
			<div class="formformat">
				<h2>Original Survey Results</h2>
					<table border>
						<tr>
							<td> ID# </td>
							<td><?php echo $row["counter"]; ?></td>
						</tr>

						<tr>
							<td>Full Name</td>
							<td><?php echo $row["fname"]; ?> <?php echo $row["lname"]; ?></td>
						</tr>

						<tr>
							
							
							<td>Email</td>
							<td><?php echo $row["email"]; ?></td>
							
							
						</tr>

						<tr>
							<td> Phone# </td>
							<td><?php echo $row["pnumber"]; ?></td>
						</tr>

						<tr>
							<td>Which Candies Do You Like?</td>
						</tr>
						<tr>
							<td><?php echo $row["like_kit"]; ?></td>
							<td><?php echo $row["like_poc"]; ?></td>
						</tr>
						<tr>
							<td>Which One Do You Like The Most?</td>
						</tr>
						<tr>
							<td><?php echo $row["fav"]; ?></td>
						</tr>
						<tr>
							<td>Why did you choose the answer above?</td>
						</tr>
						<tr>
							<td><?php echo $row["message"]; ?></td>
						</tr>
					</table>
<?php } ?>	
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
					<div class="mainbox">	
	
						<h2>Fill Out The Entire Survey To Update The Data.</h2>

						<form method="post" action="update.php">
					<ul class="formformat">
					    <li>
					    	<label>Full Name </label>
					    	<input type="text" name="fname" id="fname" class="field-divided" placeholder="First" required/>&nbsp;<input type="text" name="lname" id="lname" class="field-divided" placeholder="Last" required/>
					    </li>
					    <li>
					        <label>Email</label>
					        <input type="email" name="email" class="field-long" required/>
					    </li>
					    <li>
					    	<label>Phone Number</label>
					        <input type="number" name="pnumber" class="field-long" />
					    </li>
					    <li>
					    	<label>Which Candies Do You Like?</label>
					    	<input type="checkbox" name="pocky" id="kitkat" value="pocky"> Pocky<br>
							<input type="checkbox" name="kitkat" id="kitkat" value="kitkat"> Kitkat<br>
					    </li>

					    <li>
					    	<label>Which One Do You Like The Most?</label>
					    	<input type="radio" name="preference" value="pocky2"> Pocky<br>
							<input type="radio" name="preference" value="kitkat2"> Kitkat<br>
							<input type="radio" name="preference" value="cantchoose"> I can't choose<br>
							<input type="radio" name="preference" value="neither"> Neither
					    </li>

					    <li>
					        <label>Why did you choose the answer above?</label>
					        <textarea name="message" class="field-long field-textarea"></textarea>
					    </li>
					    <li>
					        <button type="submit" name="counter" value=<?php echo $counter; ?>>Resubmit Data</button> 
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
