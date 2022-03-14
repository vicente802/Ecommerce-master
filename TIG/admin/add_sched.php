  <?php 

    $sql00 = mysqli_query($conn, "select * from school_year where status = 'Active' ");
      $syRow = mysqli_fetch_array($sql00);

    $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
      $semRow = mysqli_fetch_array($semquer);
  ?>
<!-- Major Modal-->
<link rel="stylesheet" type="text/css" href="style1.css">

  <div class="modal fade modal-fullscreen" id="add_sched<?php echo $subjrow['subjects_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header  $schedsql=mysqli_query($conn,"select * from courses left join subject on courses.program_id=subject.course where subject.subjects_id = '".$subjrow['subjects_id']."'"); -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding Schedule</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid box">
              <form method="post" action="scheduling_db.php">
                 <div class="container-fluid">  
                   <div class="container-fluid">
                    <?php
                        $schedsql=mysqli_query($conn,"select * from courses left join subject on courses.program_id=subject.course where subject.subjects_id = '".$subjrow['subjects_id']."'");

                        $schredrow=mysqli_fetch_array($schedsql);
                    ?>
                    
                      <div class="row" style="margin-top: 15px; margin-bottom: 28px;">
                        <div class="col-sm-12 ">
                            <input type="hidden" class="form-control" name="course" value="<?php echo ($schredrow['course']); ?>">
                        </div>                 
                      </div> 

                     <div class="row" style="margin-top: -18px;">
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
                                    <input type="hidden" name="subj_title" value="<?php echo ($srow['descriptive_title']); ?>">
                                </div>                 
                             </div> 
                       </div>
                     </div>

                     <div class="row" style="margin-top: -18px;">
                      <div class="col-sm-6 ">
                          <input type="hidden" name="semester" class="form-control" value="<?php echo ($semRow['sem_id']); ?>"style="background-color: transparent;" readonly><center><?php echo $semRow['semester']; ?></center>
                      </div>
                      <div class="col-sm-6">
                          <input type="hidden" name="sy" class="form-control" value="<?php echo ($syRow['school_yr_id']); ?>"style="background-color: transparent;" readonly><center><?php echo $syRow['sy']; ?></center>
                      </div> 
                      </div>

                     <div class="row" style="margin-top: -22px;"> 
                        <div class="col-sm-6 inputBox">
                        </div> 
                    </div>

                    <div class="row" style="margin-top: 35px;">
                          <div class="col-sm-6">
                            <select name="timein" class="form-control" required>
                              <option class="hid">Time in</option>
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
                              <option class="hid">Time out</option>
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
                                <option name="" id="selector" style="display: none;">---- Select Instructor ----</option>
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
                            <input type="text" name="room" class="form-control" placeholder="Room" style="" required="">
                        </div>            
                       </div>
                       <br> 
                       <input type="hidden" name="units_lec" value="<?php echo $srow['units_lec']; ?>">
                       <input type="hidden" name="units_lab" value="<?php echo $srow['units_lab']; ?>">
                   </div>
                 </div>  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="schedbtn" id="schedbtn" class="btn btn-success btn-sm"><i class="fa fa-save"></i> | Save</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
                </div>

                 </form>

              </div> 
            </div>
          </div>
        </div>
      </div>


<!-- MAED SCHEDULE -->

<!-- Major Modal-->
<link rel="stylesheet" type="text/css" href="style1.css">

  <div class="modal fade modal-fullscreen" id="add_sched2<?php echo $subjrow2['subjects_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header  $schedsql=mysqli_query($conn,"select * from courses left join subject on courses.program_id=subject.course where subject.subjects_id = '".$subjrow['subjects_id']."'"); -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding Schedule</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid box">
              <form method="post" action="scheduling_db.php">
                 <div class="container-fluid">  
                   <div class="container-fluid">
                    <?php
                        $schedsql=mysqli_query($conn,"select * from courses left join subject on courses.program_id=subject.course where subject.subjects_id = '".$subjrow2['subjects_id']."'");

                        $schredrow=mysqli_fetch_array($schedsql);
                    ?>
                   <div class="row" style="margin-top: -15px; margin-bottom: 28px;">
                        <div class="col-sm-12 ">
                            <input type="hidden" name="course" value="<?php echo ($schredrow['course']); ?>">
                        </div>                 
                     </div> 

                     <div class="row" style="margin-top: -18px;">
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
                                    <input type="hidden" name="subj_title" value="<?php echo ($srow['descriptive_title']); ?>">
                                </div>                 
                             </div> 
                       </div>
                     </div>

                     <div class="row" style="margin-top: -18px;">
                      <div class="col-sm-6 ">
                          <input type="hidden" name="semester" class="form-control" value="<?php echo ($semRow['sem_id']); ?>"style="background-color: transparent;" readonly><center><?php echo $semRow['semester']; ?></center>
                      </div>
                      <div class="col-sm-6">
                          <input type="hidden" name="sy" class="form-control" value="<?php echo ($syRow['school_yr_id']); ?>"style="background-color: transparent;" readonly><center><?php echo $syRow['sy']; ?></center>
                      </div> 
                      </div>

                     <div class="row" style="margin-top: -22px;"> 
                        <div class="col-sm-6 inputBox"></div> 
                      </div>

                       <div class="row" style="margin-top: 35px;">
                          <div class="col-sm-6">
                            <select name="timein" class="form-control">
                              <option class="hid">Time in</option>
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

                          <!--  <input type="text" onfocus="(this.type='time')"  pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" name="timein" class="form-control" placeholder="Time In"  required=""> -->
                          </div> 

                          <div class="col-sm-6">
                            <select name="timeout" class="form-control">
                              <option class="hid">Time out</option>
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
                                <option name="" id="selector" style="display: none;">---- Select Instructor ----</option>
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
                          <div class="col-sm-4 inputBox">
                              <input type="text" name="room" class="form-control" placeholder="Room" style="background-color: transparent;">
                          </div>            
                       </div>
                       <br> 
                       <input type="hidden" name="units_lec" value="<?php echo $srow['units_lec']; ?>">
                       <input type="hidden" name="units_lab" value="<?php echo $srow['units_lab']; ?>"> 
                   </div>
                 </div>  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="schedbtn" id="schedbtn" class="btn btn-success btn-sm"><i class="fa fa-save"></i> | Save</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
                </div>

                 </form>

              </div> 
            </div>
          </div>
        </div>
      </div>


