

 <?php 
	
	//connnection
	$conn = mysqli_connect('localhost','shubham','12345678','first');
	if(!$conn){
		echo 'connection error' . mysqli_connect_error();
	}	


	//echo "hello world";
 if(isset($_POST['submit'])){
	$name = $_POST['fullname'];
	$phno = $_POST['phno'];
	$add = $_POST['address'];

	$sql="INSERT INTO customer(name,contact,address)VALUES('$name','$phno','$add')";
	if(mysqli_query($conn,$sql)){
		echo 'inserted';
	}
	else{
		echo 'error'.mysqli_error($conn);
	}
}

 //if(isset($_POST['show'])){
	$sql="SELECT * FROM customer";
	$result = mysqli_query($conn,$sql);

	$customers=mysqli_fetch_all($result,MYSQLI_ASSOC);

//	mysqli_free_result($result);
//	mysqli_close($conn);
//print_r($customers);
//echo "hii";
//}
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>getting values</title>
 </head>
 <body>
 
 <h1>welcome</h1>
<form action="firstphp.php" method="POST">
 enter your name
 <input type="text" name="fullname"> <br> <br>
 enter contact no.
 <input type="text" name="phno"> <br><br>
 enter address 
 <input type="text" name="address"><br><br>
 <input type="submit" name="submit" value = "submit">
</form>
<br>
<br>

<table>
	<tr>
		<td>Name</td>
		<td>Contact</td>
		<td>Address</td>
	</tr>
	<?php foreach($customers as $customer) :?>
		<tr>
			<td><?php echo htmlspecialchars($customer['name']); ?></td>
			<td><?php echo htmlspecialchars($customer['contact']); ?></td>
			<td><?php echo htmlspecialchars($customer['address']);?></td>
		</tr>
	<?php endforeach; ?>
</table>


 </body>

 <!--
<table>
	<tr>
		<td>Name</td>
		<td>Contact</td>
		<td>Address</td>
	</tr>
	<?php foreach($customers as $customer) :?>
		<tr>
			<td>$customer['name']</td>
			<td>$customer['contact']</td>
			<td>$customer['address']</td>
		</tr>
	<?php endforeach; ?>
</table>
 -->
 </html>
