<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
<label>USERNAME:</label> </br>
	    <input type="text" name="username" placeholder="Pick a Username"/>
	</br>

	<label>PASSWORD:</label></br> 
	    <input type="password" name="password" placeholder="Password"/>
	</br>

	<input type="submit" value="submit"/>
	</form>

	<?php require 'db.php';

      session_start();

      if ($_SERVER["REQUEST_METHOD"]=="POST") {
        # code...
        $myusername = mysqli_real_escape_string($con, $_POST['username']);
  
        $mypassword = mysqli_real_escape_string($con, $_POST['password']);        

        $sql = "SELECT * FROM users where username = '$myusername' and password = '$mypassword'";

        $result = mysqli_query($con , $sql);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $myusername = $row['username'];

        $count = mysqli_num_rows($result);

        if ($count==1) {
          // session_register("$myusername");

          $_SESSION['SIGNED_IN'] = $myusername;

          header("location:home.php?user=$myusername");
        }
        else{
          echo "invalid login details";
        }
      }

      ?>
      
</body>
</html>