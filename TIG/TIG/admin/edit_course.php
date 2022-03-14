 <!-- Delete Course -->
    <div class="modal fade modal-fullscreen" id="del_course<?php echo $courserow['program_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Deleting Course..</h5></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
          <?php
            $a=mysqli_query($conn,"select * from courses where program_id='".$courserow['program_id']."'");
            $b=mysqli_fetch_array($a);
          ?>
         <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this course??</p><center>
          <h6><center>Course name: <strong><?php echo ucwords($b['program']); ?></strong></center></h6>
          <form role="form" method="POST" action="delete-course.php<?php echo '?id='.$courserow['program_id']; ?>">
        </div>                 
          </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->



 <!-- EDIT COURSE -->
  <div class="modal fade modal-fullscreen" id="edit_course<?php echo $courserow['program_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Edit Course...</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">
       
              <form method="post" action="list-course_update.php<?php echo '?id='.$courserow['program_id']; ?>" id="">
               <div class="container-fluid">  
                 <div class="container-fluid">
                  <br>
                     
                   <input type="hidden" name="program_id" class="form-control" id="program_id" >                                                          
                   <div class="row">
                     <div class="col-sm-12">
                      <input type="text" placeholder="Program" name="program" class="form-control" id="program" required value="<?php echo ($courserow['program']); ?>" />
                    </div>                 
                   </div>
                   <br>  

                   <div class="row">
                     <div class="col-sm-6">
                      <input type="text" placeholder="Accreditation Level" name="accreditation_level" class="form-control" id="accreditation_level"  value="<?php echo ($courserow['accreditation_level']); ?>" required>
                    </div>                 
                     <div class="col-sm-6">
                      <input type="text" placeholder="BOT Resolution" name="BOT_resolution" class="form-control" id="BOT_resolution" value="<?php echo ($courserow['BOT_resolution']); ?>"  required>
                    </div>                 
                   </div>
                   <br>  

                 </div>
               </div>   

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="addsub" id="addsub btnTestSaveTextButtons" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                </div>
        
        </form>
        </div> 
        </div>
        

      </div>
    </div>
  </div>  


<!------------------------------------------------------------------------------------------------------------------------------------------>

 <!-- Delete Major -->
    <div class="modal fade modal-fullscreen" id="del_major<?php echo $majorow['major_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Deleting Major..</h5></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
          <?php
            $a=mysqli_query($conn,"select * from major where major_id='".$majorow['major_id']."'");
            $b=mysqli_fetch_array($a);
          ?>
         <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this major??</p><center>
          <h6><center>Major name: <strong><?php echo ucwords($b['major']); ?></strong></center></h6>
          <form role="form" method="POST" action="delete-major.php<?php echo '?id='.$majorow['major_id']; ?>">
        </div>                 
          </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!--Edit Major Modal-->

  <div class="modal fade modal-fullscreen" id="edit_major<?php echo $majorow['major_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding Course...</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">
              <form method="post" action="list-major_update.php<?php echo '?id='.$majorow['major_id']; ?>" id="">
               <div class="container-fluid">  
                 <div class="container-fluid">
                  <br>
                     
                   <input type="hidden" name="major_id" class="form-control" id="major_id"> 

                   <div class="row">
                     <div class="col-sm-7">
                      <input type="text" placeholder="Program Abbreviation" name="program" class="form-control" id="program" value="<?php echo ($majorow['program']); ?>" required>
                    </div>                 
                   </div>
                   <br>  

                   <div class="row">
                     <div class="col-sm-12">
                      <input type="text" placeholder="Major" name="major" class="form-control" id="major" value="<?php echo ($majorow['major']); ?>" required>
                    </div>                                
                   </div>
                   <br>  

                 </div>
               </div>   

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="addsub" id="addsub btnTestSaveTextButtons" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                </div>
        
        </form>
        </div> 
        </div>
        

      </div>
    </div>
  </div>    