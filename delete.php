<?php
	include('connect_db.php');
	
	// get the 'id' variable from the URL
	$id = $_GET['id'];

	// delete record from database
	$sql = "DELETE FROM form_data WHERE id = $id";
	$conn->query($sql);

	$conn->close();
	
	header("Location: insert.php");
?>