<?php
$myServer = "localhost";
$myUser = "nishant";
$myPass = "pass1234";
$myDB = "ddp";


$conn = mysqli_connect($myServer, $myUser, $myPass,$myDB);
  if(!$conn){
	  echo 'Connection error is there'.mysqli_connect_error();
  }
//	else echo 'Connected sucessfully   ';
?>