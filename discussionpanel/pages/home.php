<?php
  session_start();
  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
$username=$_SESSION['username'];
$userid = $_SESSION['user_Id'];

?>
<html>
<head>
	<title>User Home</title>

	<?php include "user-header.php"; ?>
    <div class="container" style="margin:7% auto;">
    	<h4>Latest Discussion</h4>
    	<hr>
        <?php  include "../functions/db.php";

        $sel = mysqli_query($con,"SELECT * from category");
        while($row=mysqli_fetch_assoc($sel)){
            extract($row);
            echo '<div class="panel panel-success">
                    <div class="panel-heading">
                    <h3 class="panel-title">'.$category.'</h3>
                    </div> 
                    <div class="panel-body">
                    <table class="table table-stripped">
                    <tr>
                    <th>Questions</th>
                    <th class="pull-right">Action</th>
                    </tr>';
                    $sel1 = mysqli_query($con,"SELECT * from tblpost where cat_id='$cat_id' ");
                    while($row1=mysqli_fetch_assoc($sel1)){
                        extract($row1);
                        echo '<tr>';
                        echo '<td>'.$title.'</td>';
                        echo '<td><a href="content.php?post_id='.$post_Id.'"><button class="btn btn-success pull-right">View</button></td>';
                        echo '</tr>';
                    }


                echo '</table>
                    </div>
                </div>';
        }
        ?>
		
        <?php include "postques.php"; ?>



</body>
</html>