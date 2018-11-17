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
	<title></title>

<?php include "user-header.php"; ?>
    <div class="container" style="margin:7% auto;">
    	<h4>Latest Discussion</h4>
    	<hr>
         <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail</h3>
                </div> 
                 <div class="panel-body"> <div id="comments">
                
                            <?php
                include "../functions/db.php";
                     $id = $_GET['post_id'];
                $sql = mysqli_query($con,"SELECT * from tblpost as tp join category as c on tp.cat_id=c.cat_id where tp.post_Id='$id' ");
                if($sql==true){
                  while($row=mysqli_fetch_assoc($sql)){
                    extract($row);
                    if($user_Id==9999999999)
                    {
                       echo "<label>Question: </label> ".$title."<br>";
                       echo "<label>Posted By: </label>&nbsp;<span class='glyphicon glyphicon-eye-open'></span> Admin";
                       echo "<p class='pull-right'>".$datetime."</p>";
                       
                       if($content==null)
                        {
                          echo "";
                        }
                        else
                        {
                          echo "<p class='well'>".$content."</p>";
                        }
                    }
                    else{
                      $sel = mysqli_query($con,"SELECT * from tbluser where user_Id='$user_Id' ");
                      while($row=mysqli_fetch_assoc($sel))
                      {
                        extract($row);
                        echo "<label>Question: </label> ".$title."<br>";
                        echo "<label>Posted By: </label>&nbsp;<span class='glyphicon glyphicon-user'></span>&nbsp;".$fname;
                        echo "<p class='pull-right'>".$datetime."</p>";
                        if($content==null)
                        {
                        echo "";
                        }else{
                        echo "<p class='well'>".$content."</p>";
                        }
                        
                      }   
                    }
                }
                }         
          ?>
   <hr style="margin-bottom: 0; margin-top: 0;">
              <?php 
              $postid= $_GET['post_id'];
              $sql = mysqli_query($con,"SELECT * from tblcomment as c join tbluser as u on c.user_Id=u.user_Id where post_Id='$postid' order by datetime desc");
              $num = mysqli_num_rows($sql);
              if($num>0){
              while($row=mysqli_fetch_assoc($sql)){
              echo "<br>"."<label>Comment by: "."&nbsp;"."</label>"."<span class='glyphicon glyphicon-user'>"."</span>"."&nbsp;".$row['fname'];
              echo "<br>"."<p class='pull-right'>".$row['datetime']."</p>";
              echo "<p class='well'>".$row['comment']."</p>";
              }
            }
            ?>
            </div>
              </div>
          </div>
          <hr>
            <div class="col-sm-5 col-md-5 sidebar">
          <h3>Comment</h3>
          <form method="POST">
            <textarea type="text" class="form-control" id="commenttxt"></textarea><br>
            <input type="hidden" id="postid" value="<?php echo $_GET['post_id']; ?>">
            <input type="hidden" id="userid" value="<?php echo $_SESSION['user_Id']; ?>">
            <input type="submit" id="save" class="btn btn-success pull-right" value="Submit">
          </form>
        </div>
    </div>

		 <?php include "postques.php"; ?>
</body>
<script>

$("#save").click(function(){
var postid = $("#postid").val();
var userid = $("#userid").val();
var comment = $("#commenttxt").val();
var datastring = 'postid=' + postid + '&userid=' + userid + '&comment=' + comment;
if(!comment){
  alert("Please enter some text comment");
}
else{
  $.ajax({
    type:"POST",
    url: "../functions/addcomment.php",
    data: datastring,
    cache: false,
    success: function(result){
      document.getElementById("commenttxt").value=' ';
      $("#comments").append(result);
    }
  });
}
return false;
})

</script>
</html>

