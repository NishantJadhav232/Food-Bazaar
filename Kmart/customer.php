<?php 

include 'connect.php';

if (isset($_GET['id']))
{
	$id = mysqli_real_escape_string($conn,$_GET['id']);
	
	echo $id;
}


?>