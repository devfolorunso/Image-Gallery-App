<?php require 'db.php';
	require 'session.php';

if (!isset($_SESSION['signed_in'])) {
	header('location:photoworld.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>signout</title>
</head>
<body>

	<?php

	// session_start();

	if (session_destroy()) {

		header("location:home.php#get_started");
	}

	?>

</body>
</html>
