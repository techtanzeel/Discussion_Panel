<?php
include "../functions/db.php";
  if(isset($_GET['post_Id'])){
		$id = $_GET['post_Id'];
	}
	if(empty($id)){
		header("location:index.php");
	}

	$run = mysqli_query($con,"DELETE FROM tblpost WHERE post_Id = '$id'")
	or die(mysqli_error());  	

	header("Location:post.php");
	
?>