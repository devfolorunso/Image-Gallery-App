<?php require 'db.php';
	require 'session.php';

if (!isset($_SESSION['signed_in'])) {
	header('location:photoworld.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Image</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="photohome.css">
		<link rel="shortcut icon" type="image/x-icon" href="iicon.ico">
</head>
<body>

<!-- header starts here -->

<div class="header">

	<h3><!-- ||PHOTO WORLD* --><img src="photoworld/logo.jpg" width="200px" height="100px"></h3>
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


<div class="intro">
	<h2><?php echo $username;?>, Welcome to PHOTO WORLD</h2>
</div>


<div class="gallery">


	<?php require 'db.php';

		 $sql = "SELECT * FROM images WHERE posted_by = '$username'";

        $result = mysqli_query($con,$sql);

        while ($row = mysqli_fetch_array($result)) {

       echo "<div class='each'>";

          echo "<img src='images/".$row['image']."' alt='No image Selected'>";

          echo "<p> Posted On: ".$row['date']." </p>";

    ?>

         	<a href="display.php?img=<?php echo $row['id'];?>">VIEW</a>


	<?php

       echo "</div>";

		}

	?>


	<form action="live.php?user=<?php echo $username;?>">
        <input type="submit" value="VIEW MORE"/>
     </form>


</div>

</body>
</html>
