<?php include 'connect.php';

if (isset($_GET['id']))
{
	$id = mysqli_real_escape_string($conn,$_GET['id']);

//$url = "http://localhost/project/vendor.php?id=$id";

 $sql ="Select Username from login where ID='$id'";
	$result1 = mysqli_query($conn,$sql);
	$vendor_list1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
	mysqli_free_result($result1);

$sql1 = "SELECT * FROM vendors where Vid='$id'";
	$result = mysqli_query($conn,$sql1);
	$vendor_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);
	//print_r($vendor_list); 
}
if(isset($_POST['update']))
{
	
	
	include 'connect.php';
	//if(array_key_exists())
		
		
		if($_POST['stocks'])
		{
			$fruit = $_POST['fruit'];
					$stocks = $_POST['stocks'];

			$stocku = "UPDATE vendors SET Stocks = '$stocks' where Item ='$fruit' and Vid=$id";
				$result = mysqli_query($conn,$stocku);

		}
}
if(isset($_POST['update2']))
{
			include 'connect.php';

		if($_POST['price'])
		{
					$fruit2 = $_POST['fruit2'];
	    	$price =$_POST['price'];
			$priceu = "UPDATE vendors SET Price = '$price' where Item ='$fruit2' and Vid=$id";
					$result1 = mysqli_query($conn,$priceu);

		}
}
if(isset($_POST['update1']))
{
			include 'connect.php';

		
					$fruit1 = $_POST['fruit1'];
					$stock1 = $_POST['stock1'];
//					$id1 = $_POST['id1'];
					$price1 = $_POST['price1'];
	    			$uid1 =$_POST['uid1'];
			$add = "INSERT INTO vendors (Vid,Item,Price,Stocks,uid)
VALUES ('$id','$fruit1','$price1','$stock1','$uid1')";
					if(mysqli_query($conn,$add))
	{
		//header('Location: login.php');
	}
	else{
		echo 'query error '.mysqli_error($conn);
	}

		
}
	
	
	
//		header("Refresh:0");

	
//	if(isset($_POST['guava']))
//	{
//		echo'hu';
//		$guava = $_POST['guava'];
//		$sql = "UPDATE vendors SET Stocks =  $guava where Item ='Guava' and Vid=$id";
//		$result = mysqli_query($conn,$sql);
////		header("Refresh:0");
//
//	}
//	if(isset($_POST['mango']))
//	{
//		
//		$mango = $_POST['mango'];
//		echo $mango;
//		$sql = "UPDATE vendors SET Stocks =  $mango where Item ='Mango' and Vid=$id";
//		$result = mysqli_query($conn,$sql);
////		header("Refresh:0");
//	}
//	
//	if(isset($_POST['guava2']))
//	{
//		echo'husss';
//		$guava = $_POST['guava2'];
//		$sql = "UPDATE vendors SET Price =  $guava WHERE Item = 'Guava' ";
//		$result = mysqli_query($conn,$sql);
//	}
//	if(isset($_POST['mango2']))
//	{
//		$mango = $_POST['mango2'];
//		$sql = "UPDATE vendors SET Price =  $mango WHERE Item = 'Mango' ";
//		$result = mysqli_query($conn,$sql);
//	}
//	
	
	//print_r(array_key_exists("guava",$_POST));
	//print_r($_POST);

?>
	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VENDOR</title>
	<link rel="stylesheet" href="vendor1.css">
</head>

<body>


<div id="container">
<h2>VENDOR <?php echo $vendor_list1[0]['Username']; ?></h2>
<div  id="left">
<h3> UPDATE STOCK </h3>
<br>
<form action="<?php echo "vendor.php?id=$id"?>" method='POST'>
<!--
<label for="guava"> Guava </label>
<input type="text" name="guava" id="submit" value="" /><br/>
<label for="mango"> Mango </label>
<input type="text" name="mango" id="submit" value="" /><br/>

<input type="submit" name="update" id="submit" value="UPDATE" />
-->
<input type="text" placeholder="Fruit name" name="fruit"><br>
<input type="text" placeholder="Stocks" name="stocks"><br>
<input type="submit" name="update" id="submit" value="UPDATE" />

</form>
<br>
	
</div>

<div  id="center">
	<h3> ADD ITEMS </h3>
	<form action="<?php echo "vendor.php?id=$id"?>" method='POST'>

	<input type="text" placeholder="Fruit name" name="fruit1">
<input type="text" placeholder="Stocks" name="stock1"><br>
<input type="text" placeholder="Price" name="price1">
<input type="text" placeholder="uid" name="uid1"><br>
<br>


<input type="submit" name="update1" id="submit" value="UPDATE" />

</form>
<br>
	
</div>




<div id="right">
	<h3> UPDATE PRICE </h3>
<br>
<form action="<?php echo "vendor.php?id=$id"?>" method='POST'>
<input type="text" placeholder="Fruit name" name="fruit2"><br>
<input type="text" placeholder="Price" name="price"><br>
<input type="submit" name="update2" id="submit" value="UPDATE" />

</form>
<br>
	
</div>
	
</div>







<?php include 'vendor_table.php';?>



</body>
</html>