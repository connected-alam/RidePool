<!DOCTYPE HTML>
<head>
    		<title> Ridepool - Your Driver</title>
    		<link rel="stylesheet" type="text/css" href="ridepool_style.css">
    		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,900" rel="stylesheet">
			</head>
			<body>
    			<h1>YOUR DRIVER</h1>
    			<!--BACKGROUND BAR-->
    			<div class="background-bar" style="position: absolute; ; left:0px; top:100px;">
<?php
if(isset($_POST["selectride"])) {
	include('server.php');
	$userid = $_POST['row_id'];
	//echo '<p>' . $userid . '</p>';
	$db = mysqli_connect("localhost", "root", "", "ridepool");
	if (!$db) 
		die("MySQL connection error");
		
	$query = "SELECT * FROM users WHERE id='$userid'";
	$result = mysqli_query($db, $query);
	$count = mysqli_num_rows($result);
		
	if ($count == 1) {
		$row = mysqli_fetch_row($result);
		//email
		echo'<table style=\'position: absolute; left: 50%; top: 10px; transform: translate(-50%,0);\'>';
		echo'<tr><td>Name:</td><td>' . $row[1] . '</td></tr>';
		//email
		echo'<tr><td>Email:</td><td>' . $row[4] . '</td></tr>';
		//phone
		echo '<tr><td>Phone:</td><td>' . $row[6] . '</td></tr>';
	}
}
?>
</html>