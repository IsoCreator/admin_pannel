<?php
	include('connect_db.php');
	
	// delete record from database
	$sql = "DELETE FROM form_data WHERE id = $id";
	$conn->query($sql);

	$conn->close();
	
	header("Location: insert.php");
?>