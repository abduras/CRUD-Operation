<?php
require_once 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<a href="index.php">Add User</a>
	<table class="data">
		<tr>
			<th> Sl No</th>
			<th>Name</th>
			<th>Place of birth</th>
			<th>Date of birth</th>
			<th>Action</th>
		</tr>

		<?php
			$i=1;
			$result=mysqli_query($con, "SELECT * FROM `web`");
			while ($row=mysqli_fetch_assoc($result)) {
			?>
		<tr>
			<td><?= $i ?></td>
			<td><?= ucwords($row['name']) ?></td>
			<td><?= $row['place'] ?></td>
			<td><?= $row['birth'] ?></td>
			<td>
				<a href="edit.php?edit=<?=base64_encode($row['id']) ?>">Edit</a>
				<a href="delete.php?id=<?=base64_encode($row['id']) ?>">Delete</a>
			</td>

		</tr>
			<?php
			$i++;
			}
		?>
	</table>
</body>