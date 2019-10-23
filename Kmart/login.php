<?php
	
include 'connect.php';

if(isset($_POST['newuser']))
{	
  
$uname=$_POST['uname'];
$pass=$_POST['psw'];
$client=$_POST['client'];
	
$sql = "INSERT INTO login (ID,Username,Password,Client)
VALUES ('$id','$uname','$pass','$client')";

	if(mysqli_query($conn,$sql))
	{
		//header('Location: login.php');
	}
	else{
		echo 'query error'.mysqli_error($conn);
	}

	
//	$result = mysqli_query($conn,$sql);
//	mysqli_close($conn);
	
}

	if(isset($_POST['login']))
	{
		$uname=$_POST['uname'];
		$pass=$_POST['psw'];
	$auth = "select Password from login where Username='$uname'";	
		$result = mysqli_query($conn,$auth);
	$vendor_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);
	
	if($pass==$vendor_list[0]['Password'])
	{
			
		
		
		
		if(isset($_POST['client']))
		{
			
			if($_POST['client']=='vendor')
			{
						$id=$_POST['id'];
					header("Location: http://localhost/Kmart/vendor.php?id=$id");  /* Redirect browser */
		}
			else if($_POST['client']=='customer')
			{
				$id=$_POST['id'];
									header("Location: http://localhost/Kmart/website.php?id=$id");  /* Redirect browser */

			}
		}
	}
	else
	{
			  header("Location:http://localhost/Kmart/website.php");
	}
	
	}
 ?>
 
 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 200px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 200px;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
#loginsubmit 
	{
		background-color: dodgerblue;
	}
</style>
</head>
<body>

<h2 >Click to Log in</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<!--highlights start here-->

<?php include'connect.php' ;

	if($_POST['submit'])
	{
		$fruit = $_POST['fruit'];
	

	$item = "Select Vid,Item,Price,Stocks from vendors where Item ='$fruit'";
	$result = mysqli_query($conn,$item)	;
	$vendor_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);

	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="table1.css">
	<link rel="stylesheet" href="vendor1.css">
</head>
<body>
	<div class="container" id="market">
	<div class="fruit_cmp">
	<form action="login.php" method="POST">
		<h5>Check Fruit Price Stock availability for each VENDOR</h5>
		<input type="text" name="fruit" placeholder="Enter Fruit">
		<input type="submit" name="submit" value="Submit">
	</form>
	
		<table>
  <tr>
    <th>Vid</th>
    <th>Item</th>
    <th>Price</th>
    <th>Stocks</th>
  </tr>
  <?php foreach($vendor_list as $row) { ?>
  <tr>
    <td><?php 	echo htmlspecialchars($row['Vid']); ?></td>
    <td><?php 	echo htmlspecialchars($row['Item']); ?></td>
    <td><?php 	echo htmlspecialchars($row['Price']); ?></td>
    <td><?php 	echo htmlspecialchars($row['Stocks']); ?></td>
  </tr>
  <?php } ?>
  </table>
	</div>	
			
	</div>
	


</body>
</html>
<!--highlights end here-->

<div id="id01" class="modal">

 
  
  <form class="modal-content animate" action="login.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="avatar.png" width="50px" height="200px" alt="Avatar" class="avatar">
    </div>

    <div class="container">
     <label for="uname"><b>ID</b></label><br>
      <input type="text" placeholder="Enter ID" name="id" ><br>
     
      <label for="uname"><b>Username</b></label><br>
      <input type="text" placeholder="Enter Username" name="uname" ><br>

      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="psw" ><br>
        
      <label>
        <input type="radio"  name="client" value="customer"> Customer
        <input type="radio"  name="client" value="vendor"> Vendor <br>
      </label>
         <label>
			 <input type="radio"  name="newuser" value="customer"> New User </label>
          <br>
          <input type="submit" name="login" class="btn btn-primary" id="loginsubmit" value="LOGIN" /><br>
<!--
        <button onclick="redir()"><a href="http://localhost/project/vendor1_list.php">Confirm</a> 
          </button>
-->
        	
        
           
    </div>
 </form>
  
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>





</body>
</html>


