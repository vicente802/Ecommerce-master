<!-- Major Modal-->
<link rel="stylesheet" type="text/css" href="style1.css">

  <div class="modal fade modal-fullscreen" id="section-modal" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
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

                        <div id="font" class="hid">
                            <i class="fas fa-check"></i>
                        </div>
                        <div id="wrong" class="hid">
                            <i class="fas fa-times"></i>
                        </div>
                   <div class="row" style="margin-top: -18px; margin-bottom: 28px;">
                        <div class="col-sm-12 ">
                            <select class="form-control" name="course" id="major0">
                              <option name="" id="selector" style="display: none;">SELECT COURSE</option>
                              <?php
                                $cosql=mysqli_query($conn,"select * from courses");
                                while($corow=mysqli_fetch_array($cosql)){
                                  ?>
                                    <option value="<?php echo $corow['program_id']; ?>"><?php echo $corow['program']; ?></option>
                                  <?php
                                }
                              ?>
                            </select>
                        </div>                 
                     </div> 

                     <div class="row" style="margin-top: -18px;">
                        <div class="col-sm-12 ">
                            <select class="form-control" name="major" id="major0">
                              <option name="" id="selector" style="display: none;">SELECT MAJOR</option>
                              <?php
                                $majorsql=mysqli_query($conn,"select * from major");
                                while($majorow=mysqli_fetch_array($majorsql)){
                                  ?>
                                    <option value="<?php echo $majorow['major_id']; ?>"><?php echo $majorow['major']; ?></option>
                                  <?php
                                }
                              ?>
                            </select>
                        </div>                 
                     </div>
                 
                     <div class="row">
                       <div class="col-sm-12"> 
                         <label id="commentSelectorPrompt"></label> 
                          <select class="form-control" name="subject" id="subject02" onchange="validateSelector()">
                            <option name="" id="selector" style="display: none;">SELECT SUBJECT</option>
                            <?php
                              $subjsql=mysqli_query($conn,"select * from subject");
                              while($subjectrow=mysqli_fetch_array($subjsql)){
                                ?>
                                  <option value="<?php echo $subjectrow['subjects_id']; ?>"><?php echo $subjectrow['descriptive_title']; ?></option>
                                <?php
                              }
                            ?>
                          </select>
                       </div>
                     </div>

                     <div class="row" style="margin-top: 8px;">
                      <div class="col-sm-6 inputBox">
                        <select class="form-control" name="semister" id="semister02" >
                            <option name="" id="selector" style="display: none;">Semister</option>
                            <option name="" id="" value="1st Semister">1st Semister</option>
                            <option name="" id="" value="2nd Semister">2nd Semister</option>
                        </select>
                      </div>

                      <div class="col-sm-6 inputBox">
                          <input type="text" name="room" class="form-control" placeholder="Room" style="background-color: transparent; border: 1px solid black;">
                      </div> 
                     </div>

                     <div class="row" style="margin-top: -22px;"> 
                        <div class="col-sm-6 inputBox">
                            <select class="form-control" name="section" id="section">
                              <option name="" id="selector" style="display: none;">SECTION</option>
                              <?php
                                $secsql=mysqli_query($conn,"select * from section");
                                while($secrow=mysqli_fetch_array($secsql)){
                                  ?>
                                    <option value="<?php echo $secrow['section_id']; ?>"><?php echo $secrow['section']; ?></option>
                                  <?php
                                }
                              ?>
                            </select>
                        </div> 

                        <div class="col-sm-6 inputBox">
                            <select class="form-control" name="sy" id="sy02">
                              <option name="" id="selector" style="display: none;">S.Y.</option>
                              <?php
                                $secsql=mysqli_query($conn,"select * from sy");
                                while($secrow=mysqli_fetch_array($secsql)){
                                  ?>
                                    <option value="<?php echo $secrow['school_yr_id']; ?>"><?php echo $secrow['sy']; ?></option>
                                  <?php
                                }
                              ?>
                            </select>
                        </div> 

                       </div>

                       <div class="row" style="margin-top: 8px;">
                          <div class="col-sm-6 inputBox">
                            <input type="text" name="timein" class="form-control" placeholder="Time In" style="background-color: transparent; border: 1px solid black;">
                          </div> 

                          <div class="col-sm-6 inputBox">
                            <input type="text" name="timeout" class="form-control" placeholder="Time Out" style="background-color: transparent; border: 1px solid black;">
                          </div> 
                          </div> 

                       <div class="row " style="margin-top: -21px; margin-bottom: 10px;r">
                          <div class="col-sm-12 ">
                              <select class="form-control" name="instructor" id="instructor">
                                <option name="" id="selector" style="display: none;">SELECT INSTRUCTOR</option>
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
                       </div>
                       <br> 

                   </div>
                 </div>  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="btnsub" id="btnsub" class="btn btn-success btn-sm"><i class="fa fa-save"></i> | Save</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
                </div>

                 </form>

              </div> 
            </div>
          </div>
        </div>
      </div>

