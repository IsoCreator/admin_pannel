<?php
	include('connect_db.php');
	
	$reg_username = $POST["reg_db_username"];
	$reg_password = $POST["reg_db_password"];
	$reg_email = $POST["reg_email"];
	
	$sql = "INSERT INTO reg_data (reg_db_username, reg_db_password, reg_db_email)
			VALUES ('$reg_username', '$reg_password', '$reg_email')";
	
	$conn->close();
	
	header("Location: index.html");
?>