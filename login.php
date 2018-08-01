<?php
	include('connect_db.php');
	
	$username = $conn->escape_string($_POST["username"]);
	$result = $conn->query("SELECT * FROM reg_data WHERE reg_db_username = '$username'");
	
	if($result->num_rows == 0){
		$_SESSION['message'] = "User with that username doesn't exist!";
		header("location: error.php");
	}else{
		$user = $result->fetch_assoc();
		
		if(password_verify($_POST['password'], $user['password'])){
			$_SESSION['username'] = $user['username'];
			$_SESSION['password'] = $user['password'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['active'] = $user['active'];
			
			$_SESSION['logged_in'] = true;
			
			header("location: profile.php");
		}else{
			$_SESSION['message'] = "You have entered wrong password, try again!";
			header("location: error.php");
		}
	}
?>