<?php
require "../includes/checkAuth.php";
require "../includes/database.php";
$result = mysqli_query($db, "SELECT * FROM survey9 WHERE ID = '".escape($_GET["id"])."';");
$row = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sydney Administration System: Edit Response</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/grid.css">
</head>

<body>

	<div class="container">

		<div class="mainbox">
			<h1>Edit Response</h1>

			<form method="post" action="editProc.php">
				<div class="formformat">
					<div class="info-wrapper">

						<div>
							<div class="question-text">First Name</div>
							<input type="text" name="fname" id="fname" class="field-long" value="<?php echo $row["firstName"]; ?>" required>
						</div>

						<div>
							<div class="question-text">Last Name</div>
							<input type="text" name="lname" id="lname" class="field-long" value="<?php echo $row["lastName"]; ?>" required>
						</div>

						<div>
							<div class="question-text">Email</div>
							<input type="email" name="email" class="field-long" value="<?php echo $row["email"]; ?>" required>
						</div>

						<div>
							<div class="question-text">Phone Number</div>
							<input type="tel" name="pnumber" class="field-long" value="<?php echo $row["cellNum"]; ?>">
						</div>
					</div>

					<div class="radio-form">

						<div>
							<div class="question-text">Which of these brands do you know?</div>
							<div class="option"><input type="checkbox" name="familiarPocky" id="pocky"<?php if ($row["familiar"] == "pocky" || $row["familiar"] == "both") echo " checked"; ?>><label for="pocky" class="check-label">Pocky</label></div>
							<div class="option"><input type="checkbox" name="familiarKitkat" id="kitkat"<?php if ($row["familiar"] == "kitkat" || $row["familiar"] == "both") echo " checked"; ?>><label for="kitkat" class="check-label">KitKat</label></div>
						</div>

						<div>
							<div class="question-text">Which of these brands have you tried?</div>
							<div class="option"><input type="checkbox" name="triedPocky" id="tpocky"<?php if ($row["tried"] == "pocky" || $row["familiar"] == "both") echo " checked"; ?>><label for="tpocky" class="check-label">Pocky</label></div>
							<div class="option"><input type="checkbox" name="triedKitkat" id="tkitkat"<?php if ($row["tried"] == "kitkat" || $row["familiar"] == "both") echo " checked"; ?>><label for="tkitkat" class="check-label">KitKat</label></div>
						</div>

						<div>
							<div class="question-text">Which of these brands do you prefer?</div>
							<div class="option"><input type="radio" name="preference" value="pocky" id="ppocky"<?php if ($row["prefer"] == "pocky") echo " checked"; ?>><label for="ppocky" class="radio-label">Pocky</label></div>
							<div class="option"><input type="radio" name="preference" value="kitkat" id="pkitkat"<?php if ($row["prefer"] == "kitkat") echo " checked"; ?>><label for="pkitkat" class="radio-label">KitKat</label></div>
							<div class="option"><input type="radio" name="preference" value="neither" id="pneither"<?php if ($row["prefer"] == "neither") echo " checked"; ?>><label for="pneither" class="radio-label">Neither</label></div>
						</div>
						
						<div>
							<label>Why did you choose the answers above?</label>
							<textarea name="message" class="field-long field-textarea"><?php echo $row["why"]; ?></textarea>
						</div>
						
						<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
					</div>
					
					<div>
						<input type="submit" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>

