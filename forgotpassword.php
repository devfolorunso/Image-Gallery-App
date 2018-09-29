<?php require 'db.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="fogpass.css">
</head>
<body>

	<div class="header">

		<h3>||PHOTO WORLD</h3>
		<p><a href="photoworld.php">LOGIN</a></p>
		<div class="clearboth"></div>

	</div>

<div class="content">

<form method="post">

	<label>EMAIL:</label> </br>
	    <input type="email" name="email" placeholder="Enter Email"/>
	</br>

	<button type="submit" name="get"> GET </button> </br>

<?php
if (isset($_POST['get'])) {
		$email = $_POST['email'];
		$sql = "SELECT * FROM users where email = '$email'";
		$result = mysqli_query($con , $sql);
		$row = mysqli_fetch_array($result);
		if ($email = $row['email']){
			echo "<div class='pass'>";
				echo $row['password'];
			echo "</div>";
		}
}

?>

</form>

</div>

</body>
</html>
