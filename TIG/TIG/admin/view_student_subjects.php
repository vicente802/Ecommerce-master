<?php 
  $sql0 = mysqli_query($conn, "select * from app_for_admission 
    left join courses on courses.program_id=app_for_admission.course
    left join major on major.major_id=app_for_admission.major
    where userid = '".$penrow['userid']."' ");
  $rowrow = mysqli_fetch_array($sql0);

  $queryear = mysqli_query($conn, "select * from school_year where status = 'Active' ");
  $syRow = mysqli_fetch_array($queryear);


  $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
  $semRow = mysqli_fetch_array($semquer);


?>

  <div class="modal fade" id="view_<?php echo $penrow['userid']; ?>" tabindex="-1" role="dialog" aria-spanledby="modalLargespan">
    <div class="modal-dialog modal-lg" style="width: 100%;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargespan"> Student Subjects</h4> </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">
            <div class="container-fluid" style="text-align: left;">
                <h6>Name: <?php echo ucwords($rowrow['lastname']); ?>, <?php echo ucwords($rowrow['firstname']); ?> <?php echo ucwords($rowrow['middlename']); ?></h6>
                <label style="font-size: 13px;">Course: <?php echo $rowrow['program']; ?></label><br>
                <label style="font-size: 13px;">Major: <?php echo $rowrow['major']; ?></label>
            </div>
            <br>    
                <form method="POST" action="enrollment-status.php?id=<?php echo $penrow['userid']; ?>">
                 
                              <table id="" class="display table-responsive-md" style="font-size: 13px; text-align: center;">
                                <thead>
                                  <tr style="background-color: #ebebe0;">
                                    <th style="border: none;" width="20%">Time (Saturday)</th>
                                    <th style="border: none;" width="13%">Course no.</th>
                                    <th style="border: none;" width="26%">Descriptive Title</th>
                                    <th style="border: none;" width="11%">Units</th>
                                    <th style="border: none;" width="15%">Room</th>
                                    <th style="border: none;" width="24%">Instructor</th>
                                    <th style="border: none;"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $enSql=mysqli_query($conn,"select * from schedule 
                                      left join enrolled_subject on enrolled_subject.schedule_id=schedule.schedule_id
                                      left join subject on subject.subjects_id=schedule.subjects
                                      left join instructor on instructor.instructor_id=schedule.instructor_id 
                                      where userid= '".$penrow['userid']."' AND subject.sem_id='".$semRow['sem_id']."' AND enrolled_subject.school_yr_id='".$syRow['school_yr_id']."'  ");

                                    $manen = 1;
                                    while($subjrow=mysqli_fetch_array($enSql)) { ?>
                                      <tr>
                                        <td style="border: none;"><?php echo $subjrow['time_in']; ?>-<?php echo $subjrow['time_out']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['course_no']; ?></td>
                                        <td style="border: none;"><input type="checkbox" name="subject[]" value="<?php echo $subjrow['descriptive_title']; ?>" checked style="display: none;"><?php echo $subjrow['descriptive_title']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['units_lec']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['room']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['fullname']; ?></td>
                                        <td style="border: none;"><input type="checkbox" name="schedule_id[]" value="<?php echo $subjrow['schedule_id']; ?>" checked style="display: none;"></td> 
                                      </tr>

                              <?php $manen++; }  ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <?php 
                                        $unitsQl = mysqli_query($conn, "SELECT sum(units_lec) AS total_lec FROM schedule LEFT JOIN enrolled_subject ON schedule.schedule_id=enrolled_subject.schedule_id WHERE userid = '".$penrow['userid']."' AND enrolled_subject.school_yr_id='".$syRow['school_yr_id']."' AND enrolled_subject.sem_id='".$semRow['sem_id']."'  ");
                                        $totalRow = mysqli_fetch_assoc($unitsQl);

                                        $unitsQl1 = mysqli_query($conn, "SELECT sum(units_lab) AS total_lab FROM schedule LEFT JOIN enrolled_subject ON schedule.schedule_id=enrolled_subject.schedule_id WHERE userid = '".$penrow['userid']."' AND enrolled_subject.school_yr_id='".$syRow['school_yr_id']."' AND enrolled_subject.sem_id='".$semRow['sem_id']."'  ");
                                        $totalRow1 = mysqli_fetch_assoc($unitsQl1);
                                        
                                        $appSql=mysqli_query($conn, "select * from app_for_admission where userid='".$penrow['userid']."' ");
                                        $appRow=mysqli_fetch_array($appSql);

                                        if ($appRow['type'] == 'New') {

                                        $feesQl = mysqli_query($conn, "SELECT sum(amount) AS total_fees FROM fees where status = 'new' ");
                                        $feeRow = mysqli_fetch_assoc($feesQl);

                                        $ngata = $feeRow['total_fees'];

                                        $jammo = $totalRow["total_lec"];
                                        $jammo1 = $totalRow1["total_lab"];

                                        $hays = $jammo + $jammo1;
                                        
                                        $k = $hays * 200;

                                        $datoy = $k + $ngata;
                                      ?>
                                        <th colspan="3" style="border: none;text-align:right">Total Units:</th>
                                        <th style="border: none;"><?php  echo $totalRow["total_lec"] ?></th> 
                                        <th style="border: none;"></th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" style="border: none;text-align:right">Total Fee:</th>
                                        <th style="border: none;">₱<?php  echo number_format("$datoy"); ?></th>
                                        <th style="border: none;"></th>
                                        <th style="border: none;"></th>
                                        <th style="border: none;"></th>

                                    <input type="hidden" name="course" value="<?php echo $rowrow['program']; ?>">
                                    <input type="hidden" name="major" value="<?php echo $rowrow['major']; ?>">
                                    <input type="hidden" name="school_year" value="<?php echo $syRow['school_yr_id']; ?>">
                                    <input type="hidden" name="sex" value="<?php echo $rowrow['sex']; ?>">
                                    <input type="hidden" name="semester" value="<?php echo $semRow['sem_id']; ?>">
                                    <input type="hidden" name="balance" value="<?php echo "$datoy"; ?>">
                                    <input type="hidden" name="date_of_payment">
                                    <input type="hidden" name="day" value="Sat">
                                    <input type="hidden" name="status" value="Accepted">


                                <?php  }else if ($appRow['type'] == 'Old') { 

                                        $feesQl = mysqli_query($conn, "SELECT sum(amount) AS total_fees_2 FROM fees where status = 'old' ");
                                        $feeRow = mysqli_fetch_assoc($feesQl);

                                        $ngata_1 = $feeRow['total_fees_2'];

                                        $jammo_1 = $totalRow["total_lec"];
                                        $jammo_2= $totalRow1["total_lab"];

                                        $hays_1 = $jammo_1 + $jammo_2;
                                        
                                        $k_1 = $hays_1 * 200;

                                        $datoy_1= $k_1 + $ngata_1;
                                      ?>
                                        <th colspan="3" style="border: none;text-align:right">Total Units:</th>
                                        <th style="border: none;"><?php  echo $totalRow["total_lec"] ?></th> 
                                        <th style="border: none;"></th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" style="border: none;text-align:right">Total Fee:</th>
                                        <th style="border: none;">₱<?php  echo number_format("$datoy_1"); ?></th>
                                        <th style="border: none;"></th>
                                        <th style="border: none;"></th>
                                        <th style="border: none;"></th>

                                    <input type="hidden" name="course" value="<?php echo $rowrow['program']; ?>">
                                    <input type="hidden" name="major" value="<?php echo $rowrow['major']; ?>">
                                    <input type="hidden" name="school_year" value="<?php echo $syRow['school_yr_id']; ?>">
                                    <input type="hidden" name="sex" value="<?php echo $rowrow['sex']; ?>">
                                    <input type="hidden" name="semester" value="<?php echo $semRow['sem_id']; ?>">
                                    <input type="hidden" name="balance" value="<?php echo "$datoy_1"; ?>">
                                    <input type="hidden" name="date_of_payment">
                                    <input type="hidden" name="day" value="Sat">
                                    <input type="hidden" name="status" value="Accepted">

                                <?php  } ?>
                                
                                    </tr>
                                </tfoot>
                              </table>
                            <!-- Modal footer -->
                          <div class="modal-footer">

                                <!-- send SMS -->
                                <input type="hidden" name="sender" value="From: ISPSC-GS">
                                <input type="hidden" name="reciever" value="<?php echo $penrow['contact_number']; ?>">

                                <textarea name="msg" style="display: none;">To: <?php echo ucwords($penrow['lastname']); ?>, <?php echo ucwords($penrow['firstname']); ?> <?php echo ucwords($penrow['middlename']); ?>,&#010;&#010;Please be informed that your application for enrolment has been approved. You may now print your Assessment Form and settle your fees directly at the cashier amounting to P<?php
                                 if ($appRow['type'] == 'New'){ echo number_format("$datoy");}else{ echo number_format("$datoy_1");}  ?>. Thank you!&#010;&#010;Please do not reply! </textarea>

                                <a href="pending_enrolle.php?id=<?php echo $rowrow['userid']; ?>" class="btn btn-warning btn-sm" type="submit" name="addrop" style="text-align: left;"><i class="fa fa-wrench"></i> | Add/Drop Subject</a> 

                                <button class="btn btn-success btn-sm" type="submit" name="statusBtn" style="float: right;"><i class="far fa-check-circle"></i> | Accept</button>
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                          </div> 
                 </div>
               </div>   
            </form>
          </div> 
        </div>
      </div>
    </div>
  </div>  
