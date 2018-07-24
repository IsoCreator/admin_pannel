<?php
	include('connect_db.php');
	// names here = names in index.html
	$_SESSION['reg_username'] = $_POST['reg_db_username'];
	$_SESSION['reg_password'] = $_POST['reg_db_password'];
	$_SESSION['reg_email'] = $_POST['reg_db_email'];
	
	// name_here = $_POST["name_in_database"];
	$reg_username = $conn->escape_string($_POST["reg_db_username"]);
	$reg_password = $conn->escape_string(password_hash($_POST["reg_db_password"], PASSWORD_BCRYPT));
	$reg_email = $conn->escape_string($_POST["reg_db_email"]);
	$hash = $conn->escape_string(md5( rand(0,1000)));

	$result = $conn->query("SELECT reg_db_password FROM reg_data WHERE reg_db_username = '$reg_username'") or die ($conn->error());

	if($result->num_rows > 0){
		$_SESSION['message'] = 'User with this username already exists!';
		header("location: error.php");
	}else{
		$sql = "INSERT INTO reg_data (reg_db_username, reg_db_password, reg_db_email, hash)
		VALUES ('$reg_username', '$reg_password', '$reg_email', '$hash' )";
	
		if($conn->query($sql)){
			$_SESSION['active'] = 0;
			$_SESSION['logged_in'] = true;
			$_SESSION['message'] = "Confirmation link has been sent to $email, please verify your account by clicking on the link in the message!";
			
			$to = $reg_email;
			$subject = 'Account Verification';
			$message_body = 'Hello '.$reg_username.'Thank you for signing up! Please click this link to activate your account :
			http://newform.cba.pl/verify.php?email='.$reg_email.'&hash='.$hash;
			
			mail($to, $subject, $message_body);
			
			header("location: index.html");
		}else{
			$_SESSION['message'] = 'Registration failed!';
			header("location: error.php");
		}
	}
	

	$conn->close();
?>