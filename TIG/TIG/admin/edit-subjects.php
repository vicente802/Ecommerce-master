 
 <!-- Delete subjects -->
    <div class="modal fade modal-fullscreen" id="del_subject<?php echo $subjrow['subjects_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Deleting Subject</h5></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
          <?php
            $a=mysqli_query($conn,"select * from subject where subjects_id='".$subjrow['subjects_id']."'");
            $b=mysqli_fetch_array($a);
          ?>
         <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this subject??</p><center>
          <h6><center>Subject name: <strong><?php echo ($b['descriptive_title']); ?></strong></center></h6>
          <form role="form" method="POST" action="delete-subject.php<?php echo '?id='.$subjrow['subjects_id']; ?>">
        </div>                 
          </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm" id="btn-del"><i class="fa fa-trash"></i> | Delete</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> | Cancel</button>
          </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->


<!-- Update subjects -->
  <div class="modal fade modal-fullscreen" id="edit_1_<?php echo $subjrow['subjects_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Edit subject</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
			   <div class="container-fluid">
				      <form method="post" action="subject_update.php<?php echo '?id='.$subjrow['subjects_id']; ?>" id="edit_subject_form">
               <div class="container-fluid">  
                 <div class="container-fluid">
                  <?php

                    $majorsql=mysqli_query($conn,"select * from major left join subject on subject.program_id = major.major_id where subject.subjects_id = '".$subjrow['subjects_id']."' ");

                    $majorow=mysqli_fetch_array($majorsql)
                  ?>
                  <div class="row" style="margin-top: 1px;">
                      <div class="col-sm-12 ">
                           <input type="hidden" name="major" value="<?php echo ($majorow['program_id']); ?>"><p style="color: black; text-align: center; font-size: 25px;"><strong><?php echo $majorow['major']; ?></strong></p>
                      </div>                 
                  </div> 

                  <div class="row" style="margin-top: 1px; margin-bottom: 10px;">
                      <div class="col-sm-12 ">
                           <p style="color: black; text-align: center;"><strong><?php echo $subjrow['descriptive_title']; ?></strong></p>
                      </div>                 
                  </div> 
                
                   <div class="row">
                     <div class="col-sm-4"> 
                        <input type="text" id="course_no1" placeholder="Course no." name="course_no" value="<?php echo ($subjrow['course_no']); ?>" class="form-control"  required="">
                   </div>

                     <div class="col-sm-8">
                        <input type="text" id="descriptive_title1" placeholder="Descriptive Title" name="descriptive_title" class="form-control" value="<?php echo ($subjrow['descriptive_title']); ?>" required="">
                     </div>
                   </div>
                   <br>

                   <div class="row">
                     <div class="col-sm">
                        <input type="number" id="unit_lec1" placeholder="Unit Lec"name="unit_lec" value="<?php echo ($subjrow['units_lec']); ?>" class="form-control" >
                    </div>
                     <div class="col-sm">
                        <input type="number" id="unit_lab1" placeholder="Unit Lab" name="unit_lab" value="<?php echo ($subjrow['units_lab']); ?>" class="form-control">
                    </div>
                     <div class="col-sm">
                        <input type="number" id="hours1" placeholder="Hours" name="hours" value="<?php echo ($subjrow['hours']); ?>" class="form-control">
                      </div>
                   </div>
                   <br>
                   
                 </div>
               </div>   

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="editsub" id="editsubsub btnTestSaveTextButtons" class="btn btn-success btn-sm"><i class="fa fa-save"></i> | Save changes</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
                </div>
        
        </form>
        </div> 
        </div>
      </div>
    </div>
  </div> 


<!------------------ Edit Maed -------------------->


 <!-- Delete subjects -->
    <div class="modal fade modal-fullscreen" id="del_subject<?php echo $subjrow2['subjects_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Deleting Subject</h5></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
          <?php
            $a=mysqli_query($conn,"select * from subject where subjects_id='".$subjrow2['subjects_id']."'");
            $b=mysqli_fetch_array($a);
          ?>
         <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this subject??</p><center>
          <h6><center>Subject name: <strong><?php echo ucwords($b['descriptive_title']); ?></strong></center></h6>
          <form role="form" method="POST" action="delete-subject.php<?php echo '?id='.$subjrow2['subjects_id']; ?>">
        </div>                 
          </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> | Delete</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> | Cancel</button>
          </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->


<!-- Update subjects -->
  <div class="modal fade modal-fullscreen" id="edit_2_<?php echo $subjrow2['subjects_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Edit subject</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">
              <form method="post" action="subject_update.php<?php echo '?id='.$subjrow2['subjects_id']; ?>" id="register_form">
               <div class="container-fluid">  
                 <div class="container-fluid">
                  <?php

                    $majorsql=mysqli_query($conn,"select * from major left join subject on subject.program_id = major.major_id where subject.subjects_id = '".$subjrow2['subjects_id']."' ");

                    $majorow=mysqli_fetch_array($majorsql)
                  ?>

                  <div class="row" style="margin-top: 1px;">
                      <div class="col-sm-12 ">
                           <input type="hidden" name="major" value="<?php echo ($majorow['program_id']); ?>"><p style="color: black; text-align: center; font-size: 25px;"><strong><?php echo $majorow['major']; ?></strong></p>
                      </div>                 
                  </div> 

                  <div class="row" style="margin-top: 1px; margin-bottom: 10px;">
                      <div class="col-sm-12 ">
                           <p style="color: black; text-align: center;"><strong><?php echo $subjrow2['descriptive_title']; ?></strong></p>
                      </div>                 
                  </div> 

                  <div class="row">
                      <div class="col-sm-4"> 
                          <input type="text"  placeholder="Course no." name="course_no" value="<?php echo ($subjrow2['course_no']); ?>" class="form-control"  required="">
                      </div>

                      <div class="col-sm-8">
                          <input type="text" placeholder="Descriptive Title" name="descriptive_title" class="form-control" id="form_contact_number" value="<?php echo ($subjrow2['descriptive_title']); ?>" required="">
                      </div>
                   </div>
                   <br>

                   <div class="row">
                     <div class="col-sm"><input type="text" placeholder="Unit Lec" name="unit_lec" value="<?php echo ($subjrow2['units_lec']); ?>" class="form-control" id=""></div>
                     <div class="col-sm"><input type="text" placeholder="Unit Lab" name="unit_lab" value="<?php echo ($subjrow2['units_lab']); ?>"  class="form-control" id=""></div>
                     <div class="col-sm"><input type="text" placeholder="Hours" name="hours" value="<?php echo ($subjrow2['hours']); ?>"  class="form-control" id=""></div>
                   </div>
                   <br>
                   
                 </div>
               </div>   

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="editsub" id="editsubsub btnTestSaveTextButtons" class="btn btn-success btn-sm"><i class="fa fa-save"></i> | Save changes</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
                </div>
        
        </form>
        </div> 
        </div>
        

      </div>
    </div>
  </div>  