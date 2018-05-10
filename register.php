<?php
	include('connect_db.php');
	
	$username = $POST["reg_username"];
	$password = $POST["reg_password"];
	$email = $POST["reg_email"];
	
	$sql = "INSERT INTO reg_data (reg_username, reg_password, reg_email)
			VALUES ('$username', '$password', '$email')";
	
	$conn->close();
	
	header("Location: insert.php");
?>