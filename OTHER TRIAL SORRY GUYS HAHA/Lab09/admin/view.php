<?php

require "../includes/checkAuth.php";
require "../includes/database.php";

$result = mysqli_query($db, "SELECT * FROM survey9;");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sydney Administration System</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/styles.css">
		<link rel="stylesheet" href="../css/grid.css">
		<link rel="stylesheet" href="../css/nav.css">
		
		<script type="text/javascript">
			function deleteRow(id) {
				if ( confirm('This response will be DELETED!  Is this really what you want?') ) {
					window.location.href='delete.php?id=' + id;
				}
			}
		</script>
	</head>

	<body>
		<div class="topnav" id="myTopnav">
		  <span>Logged in as <?php echo $_SESSION["user"]; ?></span>
		  <a href="logout.php">Log Out</a>
		</div>
		
		<div class="container">
			<h1>Survey Results</h1>
			
			<table>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Familiar With...</th>
					<th>Tried...</th>
					<th>Prefers...</th>
					<th>Because...</th>
					<th>Admin Tasks</th>
				</tr>
				
				<?php
				
				while ( $row = mysqli_fetch_assoc($result) ) {
					echo "<tr>";
					
					echo "<td>".$row["firstName"]." ".$row["lastName"]."</td>";
					echo "<td>".$row["email"]."</td>";
					echo "<td>".$row["cellNum"]."</td>";
					echo "<td>".$row["familiar"]."</td>";
					echo "<td>".$row["tried"]."</td>";
					echo "<td>".$row["prefer"]."</td>";
					echo "<td>".$row["why"]."</td>";
					echo "<td><a href=\"edit.php?id=".$row["ID"]."\">Edit</a>&nbsp;|&nbsp;<a href=\"javascript:deleteRow(".$row["ID"].");\">Delete</a></td>";
					
					echo "</tr>";
				}
				
				?>
				
			</table>
		</div>
	</body>
</html>

<?php
mysqli_free_result($result);
mysqli_close($db);
?>
