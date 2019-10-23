<?php
	
include 'connect.php';

		$sql="SELECT user FROM curr_user where no=1";
		$res=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($res);
		$user=$data['user'];




	$sql="SELECT * FROM cart where cust_id=$user";
	$res = mysqli_query($conn,$sql);
	$items = mysqli_fetch_all($res,MYSQLI_ASSOC);
//print_r($items);
$arr_items=[];
$vendors=[];
	foreach($items as $item){
		$sql="select * from vendor_items where item_no={$item['item_no']}";
		$res = mysqli_query($conn,$sql);
		$data = mysqli_fetch_assoc($res);
		array_push($arr_items, $data);
//		print_r($data);
//		print_r("---------------");
}
$count=0;
	foreach($arr_items as $item){
		$sql="select name from vendor where vend_id={$item['item_id']}";
		$res = mysqli_query($conn,$sql);
		$vendor_name = mysqli_fetch_assoc($res);	
		array_push($vendors, $vendor_name);

		$sql="UPDATE vendor SET score=score+1 where vend_id={$item['item_id']}";
		 mysqli_query($conn,$sql);

	$count++;
//		print_r($vendor_name);
//				print_r("---------------");
}
//print_r($count);
	foreach($items as $item){
		$sql="UPDATE vendor_items SET stock=stock-1 where item_no={$item['item_no']}";
		 mysqli_query($conn,$sql);

		$sql="UPDATE vendor_items SET score=score+1 where item_no={$item['item_no']}";
		 mysqli_query($conn,$sql);


}

	foreach($items as $item){

		$sql="DELETE FROM cart WHERE item_no={$item['item_no']} and cust_id=$user";
		 mysqli_query($conn,$sql);
}

?>


<!DOCTYPE html>
<html>
<?php include 'header.php'?>
<div class="container">
<h3>
	<?php 
			echo "TRANSACTION SUCCESSFUL";
	?>
</h3>
<br>
<h4>Transaction details </h4>
<table>
	<tr>
		<td>Vendor Name</td>
		<td>Item</td>
		<td>Price</td>
	</tr>
	<?php 
	$total_price=0;
	for ($i=0; $i < $count; $i++) {  
	?>
	<tr>
		<td><?php echo $vendors[$i]['name'] ?></td>
		<td><?php echo $arr_items[$i]['name'] ?></td>
		<td><?php
			$total_price=$total_price+$arr_items[$i]['price'];
		 echo $arr_items[$i]['price']; ?></td>
	</tr>

<!--
Vendor Name : <?php echo $vendor_name['name'] ?><br>
Item : <?php echo $data['name'] ?><br>
Price Paid : <?php echo $data['price'] ?><br>
-->
<?php } ?>
</table>
<br>
total bill : <?php echo "$total_price"; ?>

<br>
<a href="website.php">go to home</a>
	
</div>



<?php include 'footer.php'; ?>