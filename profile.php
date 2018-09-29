<?php
 	require 'db.php';
	require 'session.php';

	if (!isset($_SESSION['signed_in'])) {
  	header('location:photoworld.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<link rel="stylesheet" type="text/css" href="profile.css"/>
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

echo "<div class='all'>";

			echo "<div class='photo'>";
					echo "<a href='photo/".$row['picture']."'>
					 <img src='photo/".$row['picture']."' alt='image'> </a>";
					 echo "<p>" .'USERNAME: '  .$username.' </p> <br/>';
			echo "</div>";

							// echo "<div class='border'>"."</div>";

			echo "<p>".'NAME :  ' .$surname .'   '.$firstname.' </p>';
      echo "<p>".'EMAIL : ' .$email.'. </p>';
      echo "<p>".'PHONE_NO :  ' .$phone.'. </p>';
			echo "<p>".'ADDRESS :  ' .$address.'. </p>';
			echo "<p>".'GENDER : ' .$gender.'. </p> ';
?>
			<form action="editprofile.php?user=<?php echo $username;?>">
        <input type="submit" value="EDIT PROFILE"/>
      </form>
<?php
			echo "<div class='logo'>";
					echo "<a href='#'><img src='fb.png'></a>";
					echo "<a href='#'><img src='insta.png'></a>";
					echo "<a href='#'><img src='whats.jpg'></a>";
			echo "</div>";


echo "</div>";

echo "</br>";
	?>

</body>
</html>
