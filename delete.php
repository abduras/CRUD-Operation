<?php
	require_once 'dbcon.php';
	$id=base64_decode($_GET['id']);
	$result=mysqli_query($con,"DELETE FROM `web` WHERE `id`='$id';");
	if($result){
		header('Location:view.php');
	}
	else{
		echo mysqli_error($con);
	}
?>