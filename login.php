<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<button onclick="document.getElementById('login').style.display='block'" style="width:auto;">Login</button>

    <div id="login" class="modal">

      <form class="modal-content animate" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="log.png" alt="random image" class="login">
        </div>

        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="uname" required>
          </br>
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>

          <button type="submit">Login</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
      </form>
      <?php require 'db.php';

      session_start();

      if ($_SERVER["REQUEST_METHOD"]=="POST") {
        # code...
        $myusername = mysqli_real_escape_string($con, $_POST['usernane']);

        $mypassword = mysqli_real_escape_string($con, $_POST['password']);

        $sql = "SELECT * FROM users where usernane = '$myusername' and password = '$mypassword'";

        $result = mysqli_query($con , $sql);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if ($count==1) {
          # code...
          session_register("$myusername");

          $_SESSION['SIGNED_IN'] = $myusername;

          header("location:home.php?user=$myusername");
        }
        else{
          echo "invalid login details";
        }
      }

      ?>

    </div>

    <script>
    // Get the modal
    var modal = document.getElementById('login');

    // When the user clicks anywhere outside of the modal, close it

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>


</body>
</html>
