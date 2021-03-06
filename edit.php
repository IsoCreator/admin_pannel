<?php
	include('connect_db.php');
	
	$id = $_GET['id'];
	$sql = "SELECT id, db_name, db_surname, db_age, db_gender, db_hobby, db_description, db_password, db_picture FROM form_data WHERE id='$id'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
?>

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
		<form action="insert.php" method="post" enctype="multipart/form-data">
		  <div class="container" style="margin-top:120px">
			<!-- Example row of columns -->
			<div class="row">
			  <div class="col-md-2">
			  </div>
			  <div class="col-md-8">
				<h2>Fill in the form</h2>
				<hr>
				<div class="form-group row">
					<label for="inputFirstname" class="col-sm-2 col-form-label">Name: </label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="name" placeholder="Name" name="db_name" value="<?php echo $row['db_name']; ?>">
					</div>
				 </div>
				<div class="form-group row">
					<label for="inputLastname" class="col-sm-2 col-form-label">Surname: </label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="surname" placeholder="Surname" name="db_surname" value="<?php echo $row['db_surname']; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputAge" class="col-sm-2 col-form-label">Age: </label>
					<div class="col-sm-10">
					<select class="form-control" id="age" name="db_age">
						<option value="" disabled="disabled" selected="selected">--Select--</option>
						<option value="Under 16 years old">Under 16 years old</option>
						<option value="16-18 years old">16-18 years old</option>
						<option value="19-21 years old">19-21 years old</option>
						<option value="22-24 years old">22-24 years old</option>
						<option value="Over 24 years old">Over 24 years old</option>
					</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputGender" class="col-sm-2 col-form-label pt-0">Gender: </label>
					<div class="col-sm-10">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="db_gender" value="Man" id="gridRadios1">
							<label class="form-check-label" for="gridRadios1">
								Man
							</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="db_gender" value="Woman" id="gridRadios2">
							<label class="form-check-label" for="gridRadios2">
								Woman
							</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputInterests" class="col-sm-2 col-form-label pt-0">Interests: </label>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck1" name="db_hobby[]" value="Coding / Programming">
							<label class="form-check-label" for="gridCheck1">
								Coding / Programming
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck2" name="db_hobby[]" value="Crossword puzzles">
							<label class="form-check-label" for="gridCheck2">
								Crossword puzzles
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck3" name="db_hobby[]" value="Marathon running">
							<label class="form-check-label" for="gridCheck3">
								Marathon running
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck4" name="db_hobby[]" value="Video games">
							<label class="form-check-label" for="gridCheck4">
								Video games
							</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputDescription" class="col-sm-2 col-form-label pt-0">Description: </label>
					<div class="col-sm-10">
						<textarea class="form-control" id="FormControlTextarea1" rows="2" name="db_description" value="<?php echo $row['db_description']; ?>"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label pt-0">Password: </label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="InputPassword1" placeholder="Password" name="db_password" value="<?php echo $row['db_password']; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputRepeatPassword" class="col-sm-2 col-form-label pt-0">Repeat password: </label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="InputRepeatPassword1" placeholder="Repeat password" name="db_password" value="<?php echo $row['db_password']; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputFormControlFile1" class="col-sm-2 col-form-label pt-0">Photo: </label>
					<div class="col-sm-10">
						<input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" accept="image/jpeg">
					</div>
				</div>
				
				<hr>
				
				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			  </div>
			  <div class="col-md-2">
			  </div>
			</div>

		  </div> <!-- /container -->

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

<?php
	$sql = "DELETE FROM form_data WHERE id = $id";
	$conn->query($sql);
	$sql = "UPDATE form_data SET db_name='$name', db_surname='$surname', db_age='$age', db_gender='$gender', db_hobby='$hobby', db_description='$description', db_password='$password', db_picture='$image', date WHERE id='$id'";
	$conn->query($sql);
	$conn->close();
?>