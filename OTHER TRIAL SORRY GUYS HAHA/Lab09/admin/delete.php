<?php

	require "../includes/checkAuth.php";
	require "../includes/database.php";
	
	mysqli_query($db, "DELETE FROM survey9 WHERE ID = '".escape($_GET[id])."';");

	mysqli_close($db);
	header("Location: view.php?err=del_ok");
?>