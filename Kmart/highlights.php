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
	<form action="highlights.php" method="POST">
		<h3>Check Fruit Price Stock availability for each VENDOR</h3>
		<input type="text" name="fruit" placeholder="Enter Fruit">
		<input type="submit" name="submit" value="submit">
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
