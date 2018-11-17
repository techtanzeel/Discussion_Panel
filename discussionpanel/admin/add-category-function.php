<?php
include "../functions/db.php";
 				
extract($_POST);
$sql = "INSERT INTO `category`(category) VALUES ('$category')";
$res = mysqli_query($con,$sql);

header("Location:category.php");


?>