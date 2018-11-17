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
	<title>Your Detail</title>
    <?php include "user-header.php"; ?>

    <div class="container" style="margin:8% auto;width: 600px;">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Your Details</h3>
                </div> 
                 <div class="panel-body">
            
                            <?php
                            
                            include "../functions/db.php";

                            $sql = "SELECT * from tbluser as tu join tblaccount as ta on tu.user_Id=ta.user_Id where username='".$_SESSION['username']."' and tu.user_Id=ta.accnt_Id ";
                            $run = mysqli_query($con,$sql);
                            $row=mysqli_fetch_array($run);
                            ?>
                    <form method="POST" action="user-profile-update.php">
                        
                        <div class="form-group">
                            <label for="fname" class="cols-sm-2 control-label">Your Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <p class="form-control"><?php echo $row['fname']; ?><p/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Your Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <p class="form-control"><?php echo $row['email']; ?><p/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mob_number" class="cols-sm-2 control-label">Mobile</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile fa-lg" aria-hidden="true"></i></span>
                                    <p class="form-control"><?php echo $row['mob_number']; ?><p/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="mob_number" class="cols-sm-2 control-label">Gender</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-male fa-lg" aria-hidden="true"></i></span>
                                    <p class="form-control"><?php echo $row['gender']; ?><p/>
                                </div>
                            </div>
                    </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Username</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <p class="form-control"><?php echo $row['username']; ?><p/>
                                </div>
                            </div>
                        </div>


                        

                        <div class="form-group ">
                            <input  target="_blank" type="submit" value="Update" id="update" class="btn btn-success btn-lg btn-block login-button" />
                        </div>  
                    </form>
                     </div>
                </div>
            </div>
            <?php include "postques.php"; ?>
	</body>
</html>