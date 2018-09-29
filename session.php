<?php

	include ('db.php');
	session_start();

	$myusername = $_SESSION['signed_in'];

	$query = " SELECT * FROM users where username = '$myusername' ";

	$sql = mysqli_query($con , $query);

	$row = mysqli_fetch_array ($sql, MYSQLI_ASSOC);

	$surname = $row['surname'];
	$firstname = $row['firstname'];
	$address = $row['address'];
	$email = $row['email'];
	$username = $row['username'];
	$phone = $row['phone'];
	$password = $row['password'];
	$gender = $row['gender'];
	$picture = "<img src='photo/".$row['picture']." alt='image'image'>";
	// $_FILES ['image'] ['name'];

	if (!isset($_SESSION['signed_in'])) {

		header("locaton:photoworld.php");
	}

?>
