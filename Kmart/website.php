<?php
 include 'connect.php';


if(isset($_GET['id'])){
	$custid=mysqli_real_escape_string($conn,$_GET['id']);
	$sql="UPDATE curr_user SET user=$custid where no='$custid";
	mysqli_query($conn,$sql);
}


//	$custid=1;
//	$sql="UPDATE curr_user SET user=$custid where no=1";
//
//	mysqli_query($conn,$sql);

$sql="select vend_id,name,contact from vendor";
$res=mysqli_query($conn,$sql);
$vendor_list=mysqli_fetch_all($res,MYSQLI_ASSOC);
//print_r($vendor_name_list)

$sql="SELECT * FROM vendor_items WHERE score IN (SELECT MAX(score) from vendor_items)";
	$res=mysqli_query($conn,$sql);
	$item_list=mysqli_fetch_all($res,MYSQLI_ASSOC);

$sql="SELECT * FROM vendor WHERE score IN (SELECT MAX(score) from vendor)";
	$res=mysqli_query($conn,$sql);
	$trending_vendor_list=mysqli_fetch_all($res,MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<!--
<head>
	<title>k-mart</title>
</head>
<body>
-->

<?php include "header.php"?>

	
	
<div class="container">
<h2>Vendor List</h2>
<table>
	<tr>
		<td><h6>Name</h6></td>
		<td><h6>Contact</h6></td>
		<td><h6>visit shop</h6></td>
	</tr>
	<?php foreach($vendor_list as $vendor) :?>
		<tr>
			<td><?php echo htmlspecialchars($vendor['name']); ?></td>
			<td><?php echo htmlspecialchars($vendor['contact']); ?></td>
			<td><a href="shopinfonew.php?id=<?php echo $vendor['vend_id'] ?>">visit</a></td>
		</tr>
	<?php endforeach; ?>
</table>
</div>

<br><br>

<div class="container">
<h4>Most Trending Item </h4>
<table>
	<tr>
		<td>Name</td>
		<td>price</td>
		<td>Availabilty</td>
		<td>cart</td>
	</tr>
	<?php foreach($item_list as $item) :?>
		<tr>
			<td><?php echo htmlspecialchars($item['name']); ?></td>
			<td><?php echo htmlspecialchars($item['price']); ?></td>
			<td><?php echo htmlspecialchars($item['stock']); ?></td>
						<td>
				<form action="addtocart.php" method="POST">
					<input type="hidden" name="cartbtn" value="<?php echo $item['item_no'] ?>">
					<input type="submit" name="cart" value="add to cart">
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<br><br>
<h4>Most Trending Vendor</h4>
<table>
	<tr>
		<td>Name</td>
		<td>Contact</td>
		<td>visit shop</td>
	</tr>
	<?php foreach($trending_vendor_list as $vendor) :?>
		<tr>
			<td><?php echo htmlspecialchars($vendor['name']); ?></td>
			<td><?php echo htmlspecialchars($vendor['contact']); ?></td>
			<td><a href="shopinfonew.php?id=<?php echo $vendor['vend_id'] ?>">visit</a></td>
		</tr>
	<?php endforeach; ?>
</table>
</div>
<?php include "footer.php"?>

</html>