<?php
	// connect to the database
	include('connect_db.php');
	
	// name_here = $_POST["name_in_database"];
	$reg_username = $_POST["reg_db_username"];
	$reg_password = $_POST["reg_db_password"];
	$reg_email = $_POST["reg_db_email"];

	
	$sql = "INSERT INTO reg_data (reg_db_username, reg_db_password, reg_db_email)
			VALUES ('$reg_username', '$reg_password', '$reg_email' )";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if ($conn->query($sql) === TRUE) {
		//echo "You have registered successfully" . "<br>";
			header("Location: index.html");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	$conn->close();
?>