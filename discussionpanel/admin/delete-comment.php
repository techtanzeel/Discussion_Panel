<?php
include "../functions/db.php";
  if(isset($_GET['comment_Id'])){
		$id = $_GET['comment_Id'];
	}
	if(empty($id)){
		header("location:index.php");
	}

	$run = mysqli_query($con,"DELETE FROM tblcomment WHERE comment_Id = '$id'")
	or die(mysqli_error());  	

	header("Location:comment.php");
	
?>