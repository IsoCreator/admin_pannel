<?php
	// connect to the database
	include('connect_db.php');

	$id = $_GET['id'];
	$sql = "SELECT db_picture FROM form_data WHERE id=$id";
	$result=$conn->query($sql);
	$row = mysqli_fetch_array($result);

	echo '<img src="data:image/jpeg;base64,' . base64_encode($row['db_picture']) . '"/>';

	$conn->close();
?>