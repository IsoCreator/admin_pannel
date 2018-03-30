<?php
	// logging into the database
	$servername = "";
	$username = "";
	$password_1 = "";
	$dbname = "";
	
	$conn = new mysqli($servername, $username, $password_1, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>