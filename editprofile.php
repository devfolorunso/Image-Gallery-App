<?php require 'db.php';
		require 'session.php';
if (!isset($_SESSION['signed_in'])) {
  header('location:photoworld.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Your Profile</title>
	<link rel="stylesheet" type="text/css" href="editprofile.css">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

	<div class="header">

	  <h3>||PHOTO WORLD</h3>
	  <p><a href="profile.php"><img src='profile.png'></a></p>
	  <p><a href="signout.php">LOG OUT</a></p>
	  <p><a href="upload.php?user=<?php echo $username; ?>">UPLOAD</a></p>
	  <p><a href="live.php">LIVE</a></p>
	  <p><a href="home.php">HOME</a></p>
	  <div class="clearboth"></div>

	</div>

	 <div class="tooltip">

	<button class="button"><span>CHECK</span></button>

	<span class="tooltiptext"><?php echo "<img src='photo/".$row['picture']."' class='checky' alt='image'>";
	echo $username;?><img src="check.png" class="check"> </span>

	</div>

<?php require 'db.php';

if(isset($_GET['username'])) {
	$username = $_GET['username'];

$sql = "SELECT * FROM users where username = '$username' ";
$result = mysqli_query($con , $sql);

$row = mysqli_fetch_array($result);

	 	}
?>

<div class="update_form">

<form method="post" enctype="multipart/form-data">

	<label>SURNAME:</label></br>
	    <input type="text" name="surname" value="<?php echo $row['surname']?>"/>
	</br>

	<label>FIRSTNAME:</label> </br>
	    <input type="text" name="firstname" value="<?php echo $row['firstname']?>"/>
	</br>

	<label>ADDRESS:</label> </br>
	    <input type="text" name="address" value="<?php echo $row['address']?>"/>
	</br>

	<label>EMAIL:</label> </br>
	    <input type="email" name="email" value="<?php echo $row['email']?>"/>
	</br>


	<label>PHONE:</label> </br>
	    <input type="tel" name="phone" value="<?php echo $row['phone']?>"/>
	</br>


	<label>GENDER:</label> </br>
		<select name="gender">
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
	</br>

	<label>PROFILE PICTURE:</label></br>
	    <input type="file" name="image" id="uploadFile"  value="<?php echo $row['picture']?>"/>
	</br>

	<div class="click">
		<button name="btn">UPDATE</button>
		<button type="reset">RESET</button>
	</div>
	<?php
	require 'db.php';
	// require 'session.php';

if (isset($_POST['btn'])) {
	# code...

	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$picture = $_FILES ['image'] ['name'];

  	$uploadfile = $_FILES["image"]["tmp_name"];

    $target = "photo/". basename ($_FILES ['image'] ['name'] );

    move_uploaded_file( $uploadfile , $target);

	$sql = "UPDATE users SET surname = '$surname', firstname = '$firstname', address = '$address',
	email = '$email', phone = '$phone', gender = '$gender', picture = '$picture' where username = '$username' ";

	  if(mysqli_query($con , $sql)){
	  	header('location:profile.php');
	  }
	  else {
	  	echo "error".$sql.mysqli_error($con);
	   }
	}

mysqli_close($con);
?>


</form>

</div>
</body>
</html>
