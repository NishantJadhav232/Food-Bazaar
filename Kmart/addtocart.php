<?php
include 'connect.php';

		$sql="SELECT user FROM curr_user where no=1";
		$res=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($res);
		$user=$data['user'];

if(isset($_POST['cart'])){
		$itemno=mysqli_real_escape_string($conn,$_POST['cartbtn']);
		$sql="INSERT INTO cart(item_no,cust_id) VALUES('$itemno','$user')";
		mysqli_query($conn,$sql);
}
/*
if(isset($_POST['cart'])){
	$ids=[];
	if(!empty($_POST['checklist'])){
		foreach($_POST['checklist'] as $id){
				array_push($ids,$id);
		}
	}
}
*/
if(isset($_POST['rem'])){



		$itemno=mysqli_real_escape_string($conn,$_POST['item_removed']);
		$sql="DELETE FROM cart WHERE item_no=$itemno and cust_id=$user";
		mysqli_query($conn,$sql);
		header("Refresh:0");
}
?>

<!DOCTYPE html>
<html>
<!--
<head>
	<title></title>
</head>
<body>
-->
<?php include "header.php"?>
<div class="container">
<h1>cart</h1>
<br>
<table>
	<tr>
		<td>item</td>
		<td>price</td>
		<td>Remove</td>
	</tr>
	<?php
		$sql="select * from cart where cust_id=$user";
		$res=mysqli_query($conn,$sql);
		$ids=mysqli_fetch_all($res,MYSQLI_ASSOC);
	?>
	<?php foreach($ids as $id) :?>

		<tr>
			<?php 
				$sql="select * from vendor_items where item_no={$id['item_no']}";
				$res=mysqli_query($conn,$sql);
				$data=mysqli_fetch_assoc($res);

			?>
			<td><?php echo htmlspecialchars($data['name']); ?></td>
			<td><?php echo htmlspecialchars($data['price']); ?></td>
			<td>
					<form action="addtocart.php" method="POST">
					<input type="hidden" name="item_removed" value="<?php echo $id['item_no'] ?>">
					<input type="submit" name="rem" value="Remove">
				</form>
				<?php 


				?>
			</td>
		</tr>

	<?php endforeach; ?>
</table>
<br><br>
</div>

<div class="container">
<a href="buycart.php" class="btn brand">buy</a>
</div>

<?php include "footer.php"?>

</html>











<!--
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>cart</h1>
<br>
<table>
	<tr>
		<td>item</td>
		<td>price</td>
	</tr>
	<?php foreach($ids as $id) :?>

		<tr>
			<?php 
				$sql="select * from vendor_items where item_no=$id";
				$res=mysqli_query($conn,$sql);
				$data=mysqli_fetch_assoc($res);

			?>
			<td><?php echo htmlspecialchars($data['name']); ?></td>
			<td><?php echo htmlspecialchars($data['price']); ?></td>
		</tr>
	<?php endforeach; ?>
</table>

<a href="#">buy</a>

</body>
</html>

-->