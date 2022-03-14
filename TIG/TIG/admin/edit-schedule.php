  <?php 

    $sql00 = mysqli_query($conn, "select * from school_year where status = 'Active' ");
      $syRow = mysqli_fetch_array($sql00);

    $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
      $semRow = mysqli_fetch_array($semquer);
  ?>
 <!-- Delete MSE schedule -->
    <div class="modal fade modal-fullscreen" id="del_sched<?php echo $subjrow['schedule_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <center><h5 class="modal-title" id="myModalLabel">Deleting Schedule</h5></center>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
            <?php
            $a=mysqli_query($conn,"select * from schedule where schedule_id='".$subjrow['schedule_id']."'");
            $b=mysqli_fetch_array($a);
            ?>
            <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this schedule??</p><center>
              
            <form role="form" method="POST" action="delete-schedule.php<?php echo '?id='.$subjrow['schedule_id']; ?>">
            </div>                 
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> | Delete</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> | Cancel</button>
                </div>
            </form>
                        
            </div>
            </div>
          </div>
        </div>
    </div>
<!-- end modal -->





<!---------------Delete MaED Schedule------------------>

    <div class="modal fade modal-fullscreen" id="del_sched2<?php echo $subjrow2['schedule_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Deleting Schedule</h5></center>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <?php
                      $a=mysqli_query($conn,"select * from schedule where schedule_id='".$subjrow2['schedule_id']."'");
                      $b=mysqli_fetch_array($a);
                    ?>
                   <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this schedule??</p><center>

                    <form role="form" method="POST" action="delete-schedule.php<?php echo '?id='.$subjrow2['schedule_id']; ?>">
                  </div>                 

                  <div class="modal-footer">
                      <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> | Delete</button>
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> | Cancel</button>
                  </div>
                  </form>
            </div>
          </div>
      </div>
    </div>
  </div>
<!--end modal -->

<!-- Edit MSE Schedule -->

  <div class="modal fade modal-fullscreen" id="edit_sched<?php echo $subjrow['schedule_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Edit schedule</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">
              <form method="post" action="edit-schedule-db.php<?php echo '?id='.$subjrow['schedule_id']; ?>" id="register_form">
               <div class="container-fluid">  
                 <div class="container-fluid">

                    <div class="row">
                      <div class="col-sm-12 ">
                          <input type="hidden" class="form-control" name="course" value="<?php echo ($subjrow['course']); ?>">
                      </div>                 
                    </div>  

                     <div class="row" style="margin-top: 17px;">
                        <div class="col-sm-12 ">
                              <?php

                                $majorsql=mysqli_query($conn,"select * from major left join subject on subject.program_id = major.major_id where subject.subjects_id = '".$subjrow['subjects_id']."' ");

                                $majorow=mysqli_fetch_array($majorsql)
                                  ?>
                           <div class="row" style="margin-top: -18px; margin-bottom: 28px;">
                                <div class="col-sm-12 ">
                                    <input type="hidden" name="major" value="<?php echo ($majorow['major_id']); ?>"><p style="color: black; text-align: center; font-size: 25px;"><strong><?php echo $majorow['major']; ?></strong></p>
                                </div>                 
                             </div> 
                        </div>                 
                     </div>

                     <div class="row">
                       <div class="col-sm-12"> 
                              <?php

                                $subsql=mysqli_query($conn,"select * from subject where subject.subjects_id = '".$subjrow['subjects_id']."' ");

                                $srow=mysqli_fetch_array($subsql)
                                  ?>
                           <div class="row" style="margin-top: -33px; margin-bottom: 28px;">
                                <div class="col-sm-12 ">
                                    <input type="hidden" name="subject" value="<?php echo ($srow['subjects_id']); ?>"><p style="color: black; text-align: center;"><strong><?php echo $srow['descriptive_title']; ?></strong></p>
                                    <input type="hidden" name="course_num" value="<?php echo ($srow['course_no']); ?>">
                                </div>                 
                             </div> 
                       </div>
                     </div>


                     <div class="row" style="margin-top: -18px;">
                      <div class="col-sm-6 ">
                          <input type="hidden" name="semester" class="form-control" value="<?php echo ($semRow['sem_id']); ?>"style="background-color: transparent;" readonly><center><?php echo ($semRow['semester']); ?></center>
                      </div>
                      <div class="col-sm-6">  
                          <input type="hidden" name="sy" class="form-control" value="<?php echo ($syRow['school_yr_id']); ?>"style="background-color: transparent;" readonly><center><?php echo ($syRow['sy']); ?></center>
                      </div> 
                      </div>
                   
                     <div class="row" style="margin-top: -22px;"> 
                        <div class="col-sm-6 inputBox">
                        </div> 
                     </div>

                     <div class="row" style="margin-top: 35px;">
                          <div class="col-sm-6">
                            <select name="timein" class="form-control" required>
                              <option class="" value="<?php echo $subjrow['time_in']; ?>"><?php echo $subjrow['time_in']; ?></option>
                              <option value="*">*</option>
                              <option value="7:00 AM">7:00 AM</option>
                              <option value="7:30 AM">7:30 AM</option>
                              <option value="8:00 AM">8:00 AM</option>
                              <option value="8:30 AM">8:30 AM</option>
                              <option value="9:00 AM">9:00 AM</option>
                              <option value="9:30 AM">9:30 AM</option>
                              <option value="10:00 AM">10:00 AM</option>
                              <option value="10:30 AM">10:30 AM</option>  
                              <option value="11:00 AM">11:00 AM</option>
                              <option value="11:30 AM">11:30 AM</option>
                              <option value="12:00 PM">12:00 PM</option>
                              <option value="12:30 PM">12:30 PM</option>
                              <option value="1:00 PM">1:00 PM</option>
                              <option value="1:30 PM">1:30 PM</option>
                              <option value="2:00 PM">2:00 PM</option>
                              <option value="2:30 PM">2:30 PM</option>
                              <option value="3:00 PM">3:00 PM</option>
                              <option value="3:30 PM">3:30 PM</option>
                              <option value="4:00 PM">4:00 PM</option>
                              <option value="4:30 PM">4:30 PM</option>
                              <option value="5:00 PM">5:00 PM</option>
                              <option value="5:30 PM">5:30 PM</option>
                              <option value="6:00 PM">6:00 PM</option>
                              <option value="6:30 PM">6:30 PM</option>
                            </select>
                       </div> 

                       <div class="col-sm-6">
                            <select name="timeout" class="form-control" required>
                              <option class="" value="<?php echo $subjrow['time_out']; ?>"><?php echo $subjrow['time_out']; ?></option>
                              <option value="*">*</option>
                              <option value="7:00 AM">7:00 AM</option>
                              <option value="7:30 AM">7:30 AM</option>
                              <option value="8:00 AM">8:00 AM</option>
                              <option value="8:30 AM">8:30 AM</option>
                              <option value="9:00 AM">9:00 AM</option>
                              <option value="9:30 AM">9:30 AM</option>
                              <option value="10:00 AM">10:00 AM</option>
                              <option value="10:30 AM">10:30 AM</option>  
                              <option value="11:00 AM">11:00 AM</option>
                              <option value="11:30 AM">11:30 AM</option>
                              <option value="12:00 PM">12:00 PM</option>
                              <option value="12:30 PM">12:30 PM</option>
                              <option value="1:00 PM">1:00 PM</option>
                              <option value="1:30 PM">1:30 PM</option>
                              <option value="2:00 PM">2:00 PM</option>
                              <option value="2:30 PM">2:30 PM</option>
                              <option value="3:00 PM">3:00 PM</option>
                              <option value="3:30 PM">3:30 PM</option>
                              <option value="4:00 PM">4:00 PM</option>
                              <option value="4:30 PM">4:30 PM</option>
                              <option value="5:00 PM">5:00 PM</option>
                              <option value="5:30 PM">5:30 PM</option>
                              <option value="6:00 PM">6:00 PM</option>
                              <option value="6:30 PM">6:30 PM</option>
                            </select>
                          </div> 
                       </div> 

                       <div class="row " style="margin-top: 14px; margin-bottom: 10px;r">
                          <div class="col-sm-8">
                              <select class="form-control" name="instructor" id="instructor">
                                <option value="<?php echo $subjrow['instructor_id']; ?>" style="display: none;"><?php echo $subjrow['fullname']; ?></option>
                                <?php
                                  $insql=mysqli_query($conn,"select * from instructor");
                                  while($insrow=mysqli_fetch_array($insql)){
                                    ?>
                                      <option value="<?php echo $insrow['instructor_id']; ?>"><?php echo $insrow['fullname']; ?></option>
                                    <?php
                                  }
                                ?>
                              </select>
                          </div> 
                        <div class="col-sm-4">
                            <input type="text" name="room" class="form-control" placeholder="Room" style="" value="<?php echo $subjrow['room']; ?>" required="">
                        </div>            
                       </div>
                   
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

<!-- Edit MaED Schedule -->

  <div class="modal fade modal-fullscreen" id="edit_sched2<?php echo $subjrow2['schedule_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Edit schedule</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">
              <form method="post" action="edit-schedule-db.php<?php echo '?id='.$subjrow2['schedule_id']; ?>" id="register_form">
               <div class="container-fluid">  
                 <div class="container-fluid">

                    <div class="row">
                      <div class="col-sm-12 ">
                          <input type="hidden" class="form-control" name="course" value="<?php echo ($subjrow2['course']); ?>">
                      </div>                 
                    </div>  

                     <div class="row" style="margin-top: 17px;">
                        <div class="col-sm-12 ">
                              <?php

                                $majorsql=mysqli_query($conn,"select * from major left join subject on subject.program_id = major.major_id where subject.subjects_id = '".$subjrow2['subjects_id']."' ");

                                $majorow=mysqli_fetch_array($majorsql)
                                  ?>
                           <div class="row" style="margin-top: -18px; margin-bottom: 28px;">
                                <div class="col-sm-12 ">
                                    <input type="hidden" name="major" value="<?php echo ($majorow['major_id']); ?>"><p style="color: black; text-align: center; font-size: 25px;"><strong><?php echo $majorow['major']; ?></strong></p>
                                </div>                 
                             </div> 
                        </div>                 
                     </div>

                     <div class="row">
                       <div class="col-sm-12"> 
                              <?php

                                $subsql=mysqli_query($conn,"select * from subject where subject.subjects_id = '".$subjrow2['subjects_id']."' ");

                                $srow=mysqli_fetch_array($subsql)
                                  ?>
                           <div class="row" style="margin-top: -33px; margin-bottom: 28px;">
                                <div class="col-sm-12 ">
                                    <input type="hidden" name="subject" value="<?php echo ($srow['subjects_id']); ?>"><p style="color: black; text-align: center;"><strong><?php echo $srow['descriptive_title']; ?></strong></p>
                                    <input type="hidden" name="course_num" value="<?php echo ($srow['course_no']); ?>">
                                </div>                 
                             </div> 
                       </div>
                     </div>


                     <div class="row" style="margin-top: -18px;">
                      <div class="col-sm-6 ">
                          <input type="hidden" name="semester" class="form-control" value="<?php echo ($semRow['sem_id']); ?>"style="background-color: transparent;" readonly><center><?php echo ($semRow['semester']); ?></center>
                      </div>
                      <div class="col-sm-6">  
                          <input type="hidden" name="sy" class="form-control" value="<?php echo ($syRow['school_yr_id']); ?>"style="background-color: transparent;" readonly><center><?php echo ($syRow['sy']); ?></center>
                      </div> 
                      </div>
                   
                     <div class="row" style="margin-top: -22px;"> 
                        <div class="col-sm-6 inputBox">
                        </div> 
                     </div>

                     <div class="row" style="margin-top: 35px;">
                          <div class="col-sm-6">
                            <select name="timein" class="form-control" required>
                              <option class="" value="<?php echo $subjrow2['time_in']; ?>"><?php echo $subjrow2['time_in']; ?></option>
                              <option value="*">*</option>
                              <option value="7:00 AM">7:00 AM</option>
                              <option value="7:30 AM">7:30 AM</option>
                              <option value="8:00 AM">8:00 AM</option>
                              <option value="8:30 AM">8:30 AM</option>
                              <option value="9:00 AM">9:00 AM</option>
                              <option value="9:30 AM">9:30 AM</option>
                              <option value="10:00 AM">10:00 AM</option>
                              <option value="10:30 AM">10:30 AM</option>  
                              <option value="11:00 AM">11:00 AM</option>
                              <option value="11:30 AM">11:30 AM</option>
                              <option value="12:00 PM">12:00 PM</option>
                              <option value="12:30 PM">12:30 PM</option>
                              <option value="1:00 PM">1:00 PM</option>
                              <option value="1:30 PM">1:30 PM</option>
                              <option value="2:00 PM">2:00 PM</option>
                              <option value="2:30 PM">2:30 PM</option>
                              <option value="3:00 PM">3:00 PM</option>
                              <option value="3:30 PM">3:30 PM</option>
                              <option value="4:00 PM">4:00 PM</option>
                              <option value="4:30 PM">4:30 PM</option>
                              <option value="5:00 PM">5:00 PM</option>
                              <option value="5:30 PM">5:30 PM</option>
                              <option value="6:00 PM">6:00 PM</option>
                              <option value="6:30 PM">6:30 PM</option>
                            </select>
                       </div> 

                       <div class="col-sm-6">
                            <select name="timeout" class="form-control" required>
                              <option class="" value="<?php echo $subjrow2['time_out']; ?>"><?php echo $subjrow2['time_out']; ?></option>
                              <option value="*">*</option>
                              <option value="7:00 AM">7:00 AM</option>
                              <option value="7:30 AM">7:30 AM</option>
                              <option value="8:00 AM">8:00 AM</option>
                              <option value="8:30 AM">8:30 AM</option>
                              <option value="9:00 AM">9:00 AM</option>
                              <option value="9:30 AM">9:30 AM</option>
                              <option value="10:00 AM">10:00 AM</option>
                              <option value="10:30 AM">10:30 AM</option>  
                              <option value="11:00 AM">11:00 AM</option>
                              <option value="11:30 AM">11:30 AM</option>
                              <option value="12:00 PM">12:00 PM</option>
                              <option value="12:30 PM">12:30 PM</option>
                              <option value="1:00 PM">1:00 PM</option>
                              <option value="1:30 PM">1:30 PM</option>
                              <option value="2:00 PM">2:00 PM</option>
                              <option value="2:30 PM">2:30 PM</option>
                              <option value="3:00 PM">3:00 PM</option>
                              <option value="3:30 PM">3:30 PM</option>
                              <option value="4:00 PM">4:00 PM</option>
                              <option value="4:30 PM">4:30 PM</option>
                              <option value="5:00 PM">5:00 PM</option>
                              <option value="5:30 PM">5:30 PM</option>
                              <option value="6:00 PM">6:00 PM</option>
                              <option value="6:30 PM">6:30 PM</option>
                            </select>
                          </div> 
                       </div> 

                       <div class="row " style="margin-top: 14px; margin-bottom: 10px;r">
                          <div class="col-sm-8">
                              <select class="form-control" name="instructor" id="instructor">
                                <option value="<?php echo $subjrow2['instructor_id']; ?>"style="display: none;"><?php echo $subjrow2['fullname']; ?></option>
                                <?php
                                  $insql=mysqli_query($conn,"select * from instructor");
                                  while($insrow=mysqli_fetch_array($insql)){
                                    ?>
                                      <option value="<?php echo $insrow['instructor_id']; ?>"><?php echo $insrow['fullname']; ?></option>
                                    <?php
                                  }
                                ?>
                              </select>
                          </div> 
                        <div class="col-sm-4">
                            <input type="text" name="room" class="form-control" placeholder="Room" style="" value="<?php echo $subjrow2['room']; ?>" required="">
                        </div>            
                       </div>
                   
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