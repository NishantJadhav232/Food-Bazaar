<?php include 'get_data.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TABLE</title>
	<link rel="stylesheet" href="table1.css">
</head>
<body>

<form action="vendor_table.php" method='POST'>

<table id="market">
  <tr>
    <th>Vid</th>
    <th>Item</th>
    <th>Price</th>
    <th>Stocks</th>
    <th>uid</th>
  </tr>
<?php foreach($vendor_list as $vendor) { ?>
  <tr>
    <td><?php echo htmlspecialchars($vendor['Vid']);?>
    </td>
    <td><?php echo htmlspecialchars($vendor['Item']);?>
    </td>
    <td><?php echo htmlspecialchars($vendor['Price']);?>
    </td>
    <td><?php echo htmlspecialchars($vendor['Stocks']);?>
    </td>
     <td><?php echo htmlspecialchars($vendor['uid']);?>
    </td>
  </tr>
<?php } ?>
  
</table>
	
</form>

