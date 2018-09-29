<?php require 'db.php';
      require 'session.php';
  $msg = "";

  if (isset($_POST['upload'])) {
    # code...

      $image = $_FILES['image']['name'];

      $text = $_POST['text'];

      if (isset($_GET['username'])) {
      $username = $_GET['username'];
      }

      $sql = "INSERT INTO images (image , text , date , posted_by ) values( '$image' , '$text' , now() , '$username')";

      mysqli_query($con , $sql);

  		$uploadfile = $_FILES["image"]["tmp_name"];

      $target = "images/".basename ($_FILES ['image']['name']);

      if (move_uploaded_file( $uploadfile , $target )) {
      # code...
      header('location:live.php');
      }

      else

      {

      echo  "Error encountered while uploading Pls Retry!!!";

      }

  }

 ?>
