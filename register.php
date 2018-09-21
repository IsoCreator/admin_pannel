<?php
	include('connect_db.php');
	// names here = names in index.html
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['email'] = $_POST['email'];
	
	// name_here = $_POST["name_in_database"];
	$username = $conn->escape_string($_POST["username"]);
	$password = $conn->escape_string(password_hash($_POST["password"], PASSWORD_BCRYPT));
	$email = $conn->escape_string($_POST["email"]);
	$hash = $conn->escape_string(md5( rand(0,1000)));

	$result = $conn->query("SELECT * FROM reg_data WHERE email='$email'") or die($mysqli->error());
//echo $email;
	if($result->num_rows > 0){
		$_SESSION['message'] = 'User with this username already exists!';
		header("location: error.php");
		//echo 'maybe here?';
	}else{
		$sql = "INSERT INTO reg_data (username, password, email, hash)
		VALUES ('$username', '$password', '$email', '$hash' )";
	
		if($conn->query($sql)){
			$_SESSION['active'] = 0;
			$_SESSION['logged_in'] = true;
			$_SESSION['message'] = "Confirmation link has been sent to $email, please verify your account by clicking on the link in the message!";
			
			$to = $email;
			$subject = 'Account Verification';
			$message_body = 'Hello '.$username.'Thank you for signing up! Please click this link to activate your account :
			http://newform.cba.pl/verify.php?username='.$username.'&hash='.$hash;
			
			$headers = 'From: <register@newform.cba.pl>' . "\r\n" .
                       'Reply-To: <newform_register@gmail.com>' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();

			$status = mail($to, $subject, $message_body, $headers);
			
			/*if($status)
			{ 
				echo '<p>Your mail has been sent!</p>';
			} else { 
				echo '<p>Something went wrong, Please try again!</p>'; 
			}*/
			header("location: profile.php");
		}else{
			$_SESSION['message'] = 'Registration failed!';
			header("location: error.php");
		}
	}

	$conn->close();
?>