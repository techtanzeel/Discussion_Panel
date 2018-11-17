<div class="my-quest" id="quest">
            <div> 
                <form method="POST" action="question-function.php">
                        
                         <label>Category</label>
                        <select name="category" class="form-control">
                            <?php 
                            include "../functions/db.php";
                            $sel = mysqli_query($con,"SELECT * from category");

                                if($sel==true){
                                    while($row=mysqli_fetch_assoc($sel)){
                                        extract($row);
                                        echo '<option value='.$cat_id.'>'.$category.'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <label>Your Question</label>
                        <input type="text" class="form-control" name="title"required>
                        <label>Description</label>
                        <textarea name="content"class="form-control">
                        </textarea>
                       <br>
                        <input type="hidden" name="userid" value=<?php echo $userid; ?>>
                        <a href="" class="btn btn-warning" style="margin-left: 75%;">Cancel</a>
                        <input type="submit" class="btn btn-success pull-right" value="Post">
                   </form><br>
              </div>
        </div>