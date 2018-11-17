<?php

include "../functions/db.php";
 					date_default_timezone_set("Asia/Kolkata");
                        $datetime=date("Y-m-d h:i:s");
                        
extract($_POST);
$sql = "INSERT INTO tblpost(title,content,cat_id,datetime,user_Id) VALUES ('$title','$content','$category','$datetime','$userid')";
$res = mysqli_query($con,$sql);

if($res==true)
                            {
                                   echo '<script language="javascript">';
                                    echo 'alert("Post Successfully")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=home.php" />';
                            }


?>