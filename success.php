<?php
	session_start();
?>

<html>
<head>
	<title>Success</title>
</head>
<body>
<div>
	<h1>Success</h1>
	<p>
	<?php
		if(isset($_SESSION['message']) && !empty($_SESSION['message']))
			echo $_SESSION['message'];
		else
			header("location: index.html");
	?>
	</p>
	<a href="index.html"><button type="submit" class="btn btn-primary">Submit</button></a>
</div>
</body>
</html>