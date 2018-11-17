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
	<title>User Detail</title>

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
                    <form method="POST" action="#">
                        
                        <div class="form-group">
                            <label for="fname" class="cols-sm-2 control-label">Your Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="fname" id="fname"  value="<?php echo $row['fname']; ?>"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Your Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email" id="email" title="Please enter a valid email" " />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mob_number" class="cols-sm-2 control-label">Mobile</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="mob_number" id="mob_number"  placeholder="Mobile number" value="<?php echo $row['mob_number']; ?>" required="required" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="mob_number" class="cols-sm-2 control-label">Gender</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-male fa-lg" aria-hidden="true"></i></span>
                                    <select class="form-control" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                    </div>   

                        <div class="form-group ">
                            <input target="_blank" type="submit" value="Submit" id="update" class="btn btn-success btn-lg btn-block login-button" />
                        </div>  
                    </form>
                     </div>
                </div>

            </div>
	</body>
</html>