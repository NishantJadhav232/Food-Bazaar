<?php	
include 'connect.php';

if(isset($_GET['id']))
{

	$id=mysqli_real_escape_string($conn,$_GET['id']);

	$sql="select * from vendor_items where item_id= $id";

	$res=mysqli_query($conn,$sql);
	$item_list=mysqli_fetch_all($res,MYSQLI_ASSOC);

	$sql="select name from vendor where vend_id=$id";
	$res=mysqli_query($conn,$sql);
	$shopname=mysqli_fetch_assoc($res);

	mysqli_free_result($res);
	mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<!--
<head>
	<title>
		
	</title>
</head>
<body>
-->

<?php include "header.php"?>
<div class="container">
<h2><?php echo $shopname['name']?></h2>
<br>

<table>
	<tr>
		<td>Item</td>
		<td>availabilty</td>
		<td>Price</td>
		<td>add to cart</td>

	</tr>
	<?php foreach($item_list as $item) :?>
		<tr>
			<td><?php echo htmlspecialchars($item['name']); ?></td>
			<td><?php echo htmlspecialchars($item['stock']); ?></td>
			<td><?php echo htmlspecialchars($item['price']);?></td>
			<td>
				<form action="addtocart.php" method="POST">
					<input type="hidden" name="cartbtn" value="<?php echo $item['item_no'] ?>">
					<input type="submit" name="cart" value="add to cart">
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
</table>


</div>

<!--
				<td>
				<form action="addtocart.php" method="POST">
					<input type="hidden" name="cartbtn" value="<?php echo $item['item_no'] ?>">
					<input type="submit" name="cart" value="add to cart">
				</form>
			</td>


				<form action="addtocart.php" method="POST">
				<td
					<input type="checkbox" name="checklist[]" value="<?php echo $item['item_no']?>">
				</td>

<input type="submit" name="cart" value="add to cart">
</form>

-->
<?php include "footer.php"?>

</html>