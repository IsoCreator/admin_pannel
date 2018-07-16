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

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Security action</a>
              <a class="dropdown-item" href="#">Log out</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
	
    <main role="main">
		<div class="container" style="margin-top:120px">
		<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-14">

<?php
	// connect to the database
	include('connect_db.php');
	
	// name_here = $_POST["name_in_database"];
	$name = $_POST["reg_db_username"];
	$surname = $_POST["reg_db_password"];
	$age = $_POST["reg_db_email"];

	
	$sql = "INSERT INTO reg_data (reg_db_username, reg_db_password, reg_db_email)
			VALUES ('$name', '$surname', '$age' )";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if ($conn->query($sql) === TRUE) {
		echo "New record created successfully" . "<br>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	echo "<table class='table'>";
	echo "<thead><tr><th scope='col'>Id</th><th scope='col'>Name</th><th scope='col'>Surname</th><th scope='col'>Age</th></tr></thead>";
	
	$sql = "SELECT Id, reg_db_username, reg_db_password, reg_db_email FROM reg_data";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tbody><tr><td>" . $row["Id"] . "</td>";
			echo "<td>" . $row["reg_db_username"] . "</td>"; 
			echo "<td>" . $row["reg_db_password"] . "</td>"; 
			echo "<td>" . $row["reg_db_email"] . "</td></tr></tbody>";
			
		}
	}else{
		echo "0 results";
	}
	echo "</table>" . "<br>";
	$conn->close();
?>
				</div>
				<div class="col-md-1">
				</div>
			</div>
		</div>
	</main>
	
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="assets/js/vendor/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>