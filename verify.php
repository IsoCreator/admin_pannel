<?php
	
	include('connect_db.php');
	session_start();
	
	if((isset($_GET['username']) && !empty($_GET['username'])) && (isset($_GET['hash']) && !empty($_GET['hash']))){
		$username = $conn->escape_string($_GET['username']);
		$hash = $conn->escape_string($_GET['hash']);
		
		$result = $conn->query("SELECT * FROM reg_data WHERE reg_db_username = '$username' AND hash = '$hash' AND active = '0'");
		
		if($result->num_rows == 0){
			$_SESSION['message'] = "Account has already been activated or the URL is invalid!";
			header("location: error.php");
		}else{
			$_SESSION['message'] = "Your account has been activated!";
			
			$conn->query("UPDATE reg_data SET active = '1' WHERE reg_db_username = '$username'") or die($conn->error);
			$_SESSION['active'] = 1;
			
			header("location: success.php");
		}
	}else{
		$_SESSION['message'] = "Invalid parameters provided for account verification!";
		header("location: error.php");
	}
?>