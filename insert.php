<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="images/favicon.ico">

		<title>Form</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/jumbotron.css" rel="stylesheet">
	</head>

	<body>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="assets/js/vendor/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
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
	
	// name_here = $_POST["name_in_database"];
	$name = $_POST["db_name"];
	$surname = $_POST["db_surname"];
	$age = $_POST["db_age"];
	$gender = $_POST["db_gender"];
	$hob = $_POST["db_hobby"];
	$hobby = implode("; ",$hob);
	$description = $_POST["db_description"];
	$password = $_POST["db_password"];
	$image=addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
	
	$sql = "INSERT INTO form_data (db_name, db_surname, db_age, db_gender, db_hobby, db_description, db_password, db_picture, date)
			VALUES ('$name', '$surname', '$age', '$gender', '$hobby', '$descripton', '$password', '$image',now() )";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if ($conn->query($sql) === TRUE) {
		echo "New record created successfully" . "<br>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
		
	echo "<table class='table'>";
	echo "<thead><tr><th scope='col'>Id</th><th scope='col'>Name</th><th scope='col'>Surname</th><th scope='col'>Age</th><th scope='col'>Gender</th><th scope='col'>Interests</th><th scope='col'>Description</th><th scope='col'>Password</th><th scope='col'Date added</th><th scope='col'>Photo</th><th scope='col'>Edit</th><th scope='col'>Delete</th></tr></thead>";
	
	$sql = "SELECT id, db_name, db_surname, db_age, db_gender, db_hobby, db_description, db_password, date, db_picture FROM form_data";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tbody><tr><td>" . $row["id"] . "</td>";
			echo "<td>" . $row["db_name"] . "</td>"; 
			echo "<td>" . $row["db_surname"] . "</td>"; 
			echo "<td>" . $row["db_age"] . "</td>"; 
			echo "<td>" . $row["db_gender"] . "</td>"; 
			echo "<td>" . $row["db_hobby"] . "</td>"; 
			echo "<td>" . $row["db_description"] . "</td>"; 
			echo "<td>" . $row["db_password"] . "</td>"; 
			echo "<td>" . $row["date"] . "</td>"; 
			echo "<td>" . '<a href=getimage.php?id=' . $row["id"] . '><img width=75px src="data:image/jpeg;base64,' . base64_encode($row['db_picture']) . '"/></a>' . "</td>";
			echo "<td>" . '<a href=edit.php?id=' . $row["id"] . '><img src="Buttons/edit.jpg" height="30"/></a>' . "</td>";
			echo "<td>" . '<a href=delete.php?id=' . $row["id"] . '><img src="Buttons/delete.jpg" height="30"/></a>' . "</td></tr></tbody>";
		}
	}else{
		echo "0 results";
	}
	echo "</table>" . "<br>";
	$conn->close();
?>