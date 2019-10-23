<?php include 'connect.php';
		include 'extract.php';
?>


<?php

$sql = "SELECT * FROM vendors where Vid='$id'";
	$result = mysqli_query($conn,$sql);
	$vendor_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);
	//print_r($vendor_list);
?>