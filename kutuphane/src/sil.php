<?php
include_once 'baglanti.php';
$result = mysqli_query($connection,"SELECT * FROM uye");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Delete uye data</title>
</head>
<body>
<table>
	<tr>
	<td>Uye Id</td>
	<td>Uye Name</td>
	<td>Uye surname</td>
	<td>Address id</td>
	<td>Uye email</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["uye_id"]; ?></td>
	<td><?php echo $row["uye_name"]; ?></td>
	<td><?php echo $row["uye_surname"]; ?></td>
	<td><?php echo $row["address_id"]; ?></td>
	<td><?php echo $row["uye_email"]; ?></td>
	<td><a href="delete-process.php?uye_id=<?php echo $row["uye_id"]; ?>">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</body>
</html>