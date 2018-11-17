<?php
session_start();
if(isset($_POST['forgot']))
{
  $email=$_POST["email"];
  $mob_number=$_POST["mob_number"];
  include "../functions/db.php";
  $sql = "SELECT * from tbluser as tu join tblaccount as ta on tu.user_Id=ta.user_Id where email='".$email."' and mob_number='".$mob_number."'  ";
    $i= mysqli_query($con,$sql);
                            
  if($arr=mysqli_fetch_assoc($i))
  {
    $_SESSION['user_Id']=$arr['user_Id'];
    header("location:change.php");
  }
}
?>
<html>
<head>
	<title>Your Detail</title>
   
<!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../css/global.css">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="home.php"></a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">Discussion Panel</a>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <div class="container" style="margin:8% auto;width: 600px;">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Reset Password</h3>
                </div> 
                 <div class="panel-body">
            
                           
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Your Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="email" name="email" class="form-control" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mob_number" class="cols-sm-2 control-label">Mobile</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" name="mob_number" class="form-control" required="required" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits">
                                </div>
                            </div>
                        </div>
 

                        <div class="form-group ">
                            <input type="submit" value="Submit" name="forgot" id="forget" class="btn btn-success btn-lg btn-block login-button" />
                        </div>  
                    </form>
                     </div>
                </div>
            </div>


	</body>
</html>