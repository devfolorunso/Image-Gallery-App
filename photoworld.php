<?php require 'db.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>


<div class="header">

    <h3><!-- ||PHOTO WORLD* --><img src="photoworld/logo.jpg" width="200px" height="100px"></h3>
    <p>
		<button onclick="document.getElementById('login').style.display='block'" style="width:auto;">Login</button>

		<div id="login" class="modal">

		  <form class="modal-content animate" method="post">
		    <div class="imgcontainer">
		      <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
		      <img src="log.png" alt="random image" class="login">
		    </div>

		    <div class="container">
		      <label><b>Username</b></label>
		      <input type="text" placeholder="Enter Username" name="username" required/>
		      </br>
		      <label><b>Password</b></label>
		      <input type="password" placeholder="Enter Password" name="password" required/>

		      <button type="submit">Login</button>


		    </div>

		    <div class="container" style="background-color:#666666">
		      <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
		      <span class="psw">Forgot <a href="forgotpassword.php">password?</a></span>
		    </div>

	  <?php require 'db.php';
      session_start();

      if ($_SERVER["REQUEST_METHOD"]=="POST") {
        # code...

        $username = $_POST['username'];

        $password = $_POST['password'];

        $myusername = mysqli_real_escape_string($con,$username);

        $mypassword = mysqli_real_escape_string($con,$password);

        $sql = "SELECT * FROM users where username = '$myusername' and password = '$mypassword'";

        $result = mysqli_query($con , $sql);

        $row = mysqli_fetch_array($result);

        // $myusername = $row['username'];

        $count = mysqli_num_rows($result);

        if ($count == 1) {
          // session_register("$myusername");

          $_SESSION['signed_in'] = $myusername;

          header("location:home.php?user=$username ");
        }
        else{
          echo  "Invalid login details";
        }
      }

      ?>

		  </form>

		</div>


</p>
    <div class="clearboth"></div>

</div>

<h2 style="float:left"> Sign Up to Continue </h2>
<h3 style="margin-left:75%">Already have an account? LOGIN</h3>
</br>

<div class="sign_up">

<form method="post" enctype="multipart/form-data">
	<!-- <label>SURNAME:</label> -->
	    <input type="text" name="surname" placeholder="Surname"/>


	<!-- <label>FIRSTNAME:</label> -->
	    <input type="text" name="firstname" placeholder="First Name"/>


	<!-- <label>ADDRESS:</label>  -->
	    <input type="text" name="address" placeholder="Address"/>


	<!-- <label>EMAIL:</label>  -->
	    <input type="email" name="email" placeholder="Enter Email"/>


	<!-- <label>USERNAME:</label>  -->
	    <input type="text" name="username" placeholder="Pick a Username"/>


	<!-- <label>PHONE:</label>  -->
	    <input type="tel" name="phone" placeholder="Phone Number"/>


	<!-- <label>PASSWORD:</label> -->
	    <input type="password" name="password" placeholder="Password"/>


	<!-- <label>GENDER:</label>  -->
		<select name="gender">
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			<option value="Gay">Gay</option>
			<option value="Lesbian">Lesbian</option>
			<option value="Others">Others</option>
		</select>

	<label>CHOOSE PROFILE PICTURE:</label></br>
    	<input type="file" name="image" id="uploadFile"  value="uploadFile"/>
</br>
		<div class="click">
			<button name="btn" class="signup"> SIGN UP  </button>
			<button type="reset" class="reset">  RESET  </button>
		</div>
	</form>

<?php require 'db.php';
if (isset($_POST['btn'])) {
	# code...
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$picture = $_FILES ['image'] ['name'];

  	$uploadfile = $_FILES["image"]["tmp_name"];

    $target = "photo/". basename ($_FILES ['image'] ['name'] );

    move_uploaded_file( $uploadfile , $target);

	$sql = "INSERT INTO users values(' ','$surname','$firstname','$address','$email',
		'$username','$phone','$password','$gender',now(),'$picture')";

	  if(mysqli_query($con , $sql)){
	  	echo "You have successfully Registered. LOGIN now..";
	  }
	  else {
	  	echo "error".$sql.mysqli_error($con);
	   }
}

mysqli_close($con);
?>
</div>

<div class="welcome-note-pic">

<p><span>C</span>onnecting You and The World</p></br>
<img  src="photoworld/connectt.jpg">
<img  src="photoworld/conn.jpg">
<img  src="photoworld/4.jpg">
<img  src="photoworld/1.jpg">
<img  src="photoworld/2.jpg">
<img  src="photoworld/6.jpg">
<!-- <img  src="photoworld/4.jpg">
<img  src="photoworld/5.jpg">
<img  src="photoworld/6.jpg">
<img  src="photoworld/7.jpg">
<img  src="photoworld/8.jpg">
<img  src="photoworld/9.jpg"> -->

</div>


</body>
</html>
