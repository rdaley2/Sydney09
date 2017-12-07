<?php

// DB Login Info
$dbhost = "66.147.242.186";
$dbuser = "urcscon3_sydney";
$dbpass = "coffee1N";
$dbname = "urcscon3_sydney";

// Create connection
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Database connection failed");

// Standardized escape function
function escape($str) {
	global $db;
	return mysqli_real_escape_string($db, trim(stripslashes($str)));
}

?>