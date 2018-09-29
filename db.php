<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";

$con = mysqli_connect($dbhost,$dbuser,$dbpassword);

if (!$con) {
	# code...
 die ("connection failed " . mysqli_connect_error());
}

$sql ="CREATE DATABASE images";

if(mysqli_query($con, $sql)){

	echo "";

}

if(mysqli_select_db($con, "images")){

	echo "";

}


$images = "CREATE TABLE IF NOT EXISTS images(
id int(5) NOT NULL auto_increment PRIMARY KEY,
image varchar(200) NOT NULL,
text text(200) NOT NULL,
date datetime NOT NULL,
posted_by varchar(70) NOT NULL
)";

if (mysqli_query($con,$images)){

	echo "";

}

else{

	echo "";

}

$users = "CREATE TABLE IF NOT EXISTS users (
id int(5) NOT NULL auto_increment PRIMARY KEY,
surname varchar(40) NOT NULL ,
firstname varchar(40) NOT NULL ,
address varchar(60) NOT NULL ,
email varchar(200) NOT NULL UNIQUE,
username varchar(30) NOT NULL ,
phone varchar(15) NOT NULL ,
password varchar(30) NOT NULL ,
gender varchar(10) NOT NULL ,
date datetime NOT NULL ,
picture varchar(200) NOT NULL
)";

if (mysqli_query($con,$users)){

	echo "";

}

else{

	echo "";

}




?>
