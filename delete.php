<?php
	include('connect_db.php');
	
	// delete record from database
	$sql = "DELETE FROM user WHERE id = $id";
	$conn->query($sql);

	$conn->close();
	
	header("Location: view.php");
?>