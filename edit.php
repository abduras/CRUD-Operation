<?php
require_once 'dbcon.php';

if(isset($_GET['edit'])){
	$id=base64_decode($_GET['edit']);
	$result=mysqli_query($con,"SELECT * FROM `web` WHERE `id`='$id'");
	$row=mysqli_fetch_assoc($result);

}


	 
	if(isset($_POST['save_info'])){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$place=$_POST['place'];
		$birth=$_POST['birth'];

 		$result=mysqli_query($con,"UPDATE `web` SET `name`='$name',`place`='$place',`birth`='$birth' WHERE `id`='$id'");

 		if($result){
 			header('Location: view.php');
 		}else{
 			$error="Data not update";
 		}

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
</head>
<body>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		<table>
			<tr>
				<td>Name</td>
				<td>
					<input type="text" name="name" placeholder="Name" value="<?= $row['name']; ?>">
					<input type="hidden" name="id" value="<?= $row['id']; ?>">
				</td>
			</tr>

			<tr>
				<td>Place of birth</td>
				<td><input type="text" name="place" placeholder="Place of birth" value="<?= $row['place']; ?>"></td>
			</tr>
			<tr>
				<td>Date of birth</td>
				<td><input type="password" name="birth" placeholder="Date of birth" value="<?= $row['birth']; ?>"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="save_info" value="Update User"></td>
			</tr>
			
		</table>
	</form>
	<a href="view.php">All Users</a>

	<?php
		if(isset($success)){
			echo "<p>'. $success .'</p>";
		}
		if(isset($error)){
			echo "<p>'. $error .'</p>";
		}
	?>
</body>
</html>