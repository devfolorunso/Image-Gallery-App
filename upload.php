<?php require 'db.php';
      require 'session.php';

if (!isset($_SESSION['signed_in'])) {
  header('location:photoworld.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>upload</title>
	<link rel="stylesheet" type="text/css" href="photoupload.css">

	<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

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


<div class="content">

		 <form action="process.php" method="post" enctype="multipart/form-data">

               <input type="file" name="image" id="uploadFile"  value="uploadFile" required/>
						 </br>

              <textarea name="text" rows="7" cols="40" placeholder="Say something about this..."></textarea>
						</br>

               <input type="submit" name="upload" value="Upload image"/>

  		</form>

  		<br/>

</div>

 <div id="image_preview" class="preview"></div>

<div class="clearboth"></div>

<script type="text/javascript">

  $("#uploadFile").change(function(){

     $('#image_preview').html("");

     var total_file=document.getElementById("uploadFile").files.length;

     for(var i=0;i<total_file;i++)

     {

      $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");

     }

  });

  $('form').ajaxForm(function()

   {
    alert("Uploaded SuccessFully");

		window.location = "live.php";
   }
 );

</script>

</body>
</html>
