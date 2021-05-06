<?php
require_once 'dbcon.php';
	 
	if(isset($_POST['save_info'])){
		$name=$_POST['name'];
		$place=$_POST['place'];
		$birth=$_POST['birth'];

 		$result=mysqli_query($con,"INSERT INTO `web`(`name`,`place`,`birth`) VALUES('$name','$place','$birth')");

 		if($result){
 			$success="Data insert successfully!";
 		}else{
 			$error="Data not insert!";
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
				<td><input type="text" name="name" placeholder="Name"></td>
			</tr>

			<tr>
				<td>Place of birth</td>
				<td><input type="text" name="place" placeholder="Place of birth"></td>
			</tr>
			
			<tr>
				<td>Date of birth</td>
				<td><input type="password" name="birth" placeholder="Date of birth"></td>
			</tr>
				
			<tr>
				<td></td>
				<td><input type="submit" name="save_info" value="Add User"></td>
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