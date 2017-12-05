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
