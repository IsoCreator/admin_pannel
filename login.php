<?php
	include('connect_db.php');
	
	$log_username = $_POST["reg_db_username"];
	$log_password = $_POST["reg_db_password"];
	$log_email = $_POST["reg_db_email"];
	
	$sql = "SELECT reg_db_password FROM form_data WHERE reg_db_username = $log_username";
	
	if($sql == $log_password)
		echo "You logged in successfully";
	else
		echo "ERROR";
	
	$conn->close();
?>