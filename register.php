<?php
	include('connect_db.php');
	
	$reg_username = $POST["reg_db_username"];
	$reg_password = $POST["reg_db_password"];
	$reg_email = $POST["reg_db_email"];
	
	$sql = "INSERT INTO reg_data (reg_db_username, reg_db_password, reg_db_email)
			VALUES ('$reg_username', '$reg_password', '$reg_email')";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if ($conn->query($sql) === TRUE) {
		echo "New record created successfully" . "<br>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	$conn->close();
	
	header("Location: index.html");
?>