<?php include('head.php'); ?>
<div class="wrapper">
    
<?php include('navbar.php') ?>
        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                     <a href="#logout" class="logout d-inline-block d-lg-none ml-auto" data-toggle="modal" aria-controls="navbarSupportedContent" aria-expanded="false" style="background-color: transparent;color: #e60000"><i class="fas fa-power-off"></i> Logout</a>
                    <div class=" navbar-collapse" id="" align="center">
                        <ul class="nav navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>
            
<?php 
include('connect.php');
$id = $_GET['id'];

  $sql0 = mysqli_query($conn, "select * from app_for_admission 
    left join courses on courses.program_id=app_for_admission.course
    left join major on major.major_id=app_for_admission.major
    where userid = '$id' ");
  $rowrow = mysqli_fetch_array($sql0);

  $queryear = mysqli_query($conn, "select * from school_year where status = 'Active' ");
  $syRow = mysqli_fetch_array($queryear);


  $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
  $semRow = mysqli_fetch_array($semquer);

  $tetst=mysqli_query($conn,"SELECT COUNT(userid) as stud_total FROM enrolled_subject 
         left join schedule on schedule.schedule_id=enrolled_subject.schedule_id
         left join subject on subject.subjects_id=schedule.subjects
         where userid= '$id' AND subject.sem_id='".$semRow['sem_id']."' AND enrolled_subject.school_yr_id='".$syRow['school_yr_id']."' ");
  $testRow = mysqli_fetch_array($tetst);
  $tot = $testRow['stud_total'];
?>
<form action="subject-selection.php<?php echo '?id='.$rowrow['userid']; ?>" method="POST" id="form1" >
<div class="col-sm-5" >
<div class="input-group">

  <div class="input-group-append">

<?php
    if ($tot >= 3) { ?>
    <input type="" name="" disabled="" >
        <button class="btn btn-outline-danger" type="submit" name="add_btn" disabled="">Full</button>
  <?php  } else{ ?>
  <select class="custom-select" id="inputGroupSelect04" name="schedule" >
            <?php

                $enrolSql=mysqli_query($conn, "SELECT
                                                                      `limit_student`.`id`,
                                                                      `enrolled_subject`.`userid`,
                                                                      `limit_student`.`sem_id`,
                                                                      `limit_student`.`school_yr_id`,
                                                                      `schedule`.`room`,
                                                                      `schedule`.`time_in`,
                                                                      `schedule`.`time_out`,
                                                                      `schedule`.`course_num`,
                                                                      `schedule`.`subject_title`,
                                                                      `instructor`.`fullname`,
                                                                      `schedule`.`units_lec`,
                                                                      `schedule`.`units_lab`,
                                                                      `subject`.`descriptive_title`,
                                                                      `schedule`.`schedule_id`,
                                                                  Count(`enrolled_subject`.`schedule_id`),
                                                                      `limit_student`.`limit_student`
                                                                  FROM
                                                                      `enrolled_subject`
                                                                  Right Join `limit_student` ON `enrolled_subject`.`schedule_id` = `limit_student`.`schedule_id` AND `limit_student`.`school_yr_id` = `enrolled_subject`.`school_yr_id` AND `limit_student`.`sem_id` = `enrolled_subject`.`sem_id`
                                                                  Right Join `schedule` ON `schedule`.`schedule_id` = `limit_student`.`schedule_id` AND `schedule`.`school_yr_id` = `limit_student`.`school_yr_id` AND `schedule`.`sem_id` = `limit_student`.`sem_id`
                                                                  RIGHT JOIN subject on subject.subjects_id=schedule.subjects
                                                                  RIGHT JOIN instructor on instructor.instructor_id=schedule.instructor_id 
                                                                  Inner Join `major` ON `schedule`.`major_id` = `major`.`major_id`
                                                                  Inner Join `app_for_admission` ON `major`.`major_id` = `app_for_admission`.`major`
                                                                  WHERE app_for_admission.userid = '$id' AND
                                                                    `limit_student`.`sem_id` =  '". $semRow['sem_id']."' AND
                                                                    `limit_student`.`school_yr_id` =  '". $syRow['school_yr_id']."'
                                                                  GROUP BY
                                                                    `schedule`.`room`,
                                                                    `schedule`.`subject_title`,
                                                                    `schedule`.`course_num`
                                                                  HAVING
                                                                     Count(`enrolled_subject`.`schedule_id`) < 1
                                                                          ");
                    while($enrOwrow=mysqli_fetch_array($enrolSql)){ ?>
                        <option style="display: none;">----Select subject----</option>
                        <option value="<?php echo $enrOwrow['schedule_id']; ?>"><?php echo $enrOwrow['subject_title']; ?></option>
            <?php } ?>  
  </select>

                                                <input type="hidden" name="subject" id="sched2" class="success" value="<?php //echo $enrollmentRow['descriptive_title'];?>" >
                                                <input type="hidden" name="school_yr_id" value="<?php echo $syRow['school_yr_id'];?>">
                                                <input type="hidden" name="course" value="<?php echo $courseRow['program_id'];?>" >
                                                <input type="hidden" name="semester" value="<?php echo $semRow['sem_id'];?>" >
                                                <input type="hidden" name="AY" value="<?php echo $courseRow['AY'];?>" >  
        <button class="btn btn-outline-secondary" type="submit" name="add_btn">Add</button>
 <?php }

?>

</div>
</div>
</div>
</form>

                <div style="height: 10px;"></div>
                <form method="POST" action="enrollment-status.php?id=<?php echo $rowrow['userid']; ?>">

                             <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px; text-align: center;">
                                <thead>
                                  <tr style="background-color: #ebebe0;">
                                    <th >Time (Saturday)</th>
                                    <th >Course no.</th>
                                    <th >Descriptive Title</th>
                                    <th >Units</th>
                                    <th >Room</th>
                                    <th >Instructor</th>
                                    <th > Drop</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $enSql=mysqli_query($conn,"select * from enrolled_subject 
                                      left join schedule on schedule.schedule_id=enrolled_subject.schedule_id
                                      left join subject on subject.subjects_id=schedule.subjects
                                      left join instructor on instructor.instructor_id=schedule.instructor_id 
                                      where userid= '$id' AND subject.sem_id='".$semRow['sem_id']."' AND enrolled_subject.school_yr_id='".$syRow['school_yr_id']."' ");

                                    while($rowrowrow=mysqli_fetch_array($enSql)) { ?>
                                      <tr>
                                        <td ><?php echo $rowrowrow['time_in']; ?>-<?php echo $rowrowrow['time_out']; ?></td>
                                        <td ><?php echo $rowrowrow['course_no']; ?></td>
                                        <td >
                                            <input type="checkbox" name="subject[]" value="<?php echo $rowrowrow['descriptive_title']; ?>" checked style="display: none;"><?php echo $rowrowrow['descriptive_title']; ?>
                                        </td>
                                        <td ><?php echo $rowrowrow['units_lec']; ?></td>
                                        <td ><?php echo $rowrowrow['room']; ?></td>
                                        <td ><?php echo $rowrowrow['fullname']; ?></td>
                                        <td style="display: none;">
                                            <input type="checkbox" name="schedule_id[]" value="<?php echo $rowrowrow['schedule_id']; ?>" checked >
                                        </td> 
                                        <td>
                                            <a href="addndrop.php<?php echo '?id='.$rowrowrow['id']; ?>" style="color: red;" class="btn btn-sm" name="dropdrop"><i class="fa fa-minus-square"></i></a>
                                        </td>
                                     
                                      </tr>

                              <?php }  ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <?php 
                                        $unitsQl = mysqli_query($conn, "SELECT sum(units_lec) AS total_lec FROM schedule LEFT JOIN enrolled_subject ON schedule.schedule_id=enrolled_subject.schedule_id WHERE userid = '$id ' AND enrolled_subject.school_yr_id='".$syRow['school_yr_id']."' AND enrolled_subject.sem_id='".$semRow['sem_id']."'  ");
                                        $totalRow = mysqli_fetch_assoc($unitsQl);

                                        $unitsQl1 = mysqli_query($conn, "SELECT sum(units_lab) AS total_lab FROM schedule LEFT JOIN enrolled_subject ON schedule.schedule_id=enrolled_subject.schedule_id WHERE userid = '$id ' AND enrolled_subject.school_yr_id='".$syRow['school_yr_id']."' AND enrolled_subject.sem_id='".$semRow['sem_id']."'  ");
                                        $totalRow1 = mysqli_fetch_assoc($unitsQl1);
                                        
                                        $appSql=mysqli_query($conn, "select * from app_for_admission where userid='$id ' ");
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
                                        <td ><?php  echo $totalRow["total_lec"] ?></td>
                                        <th colspan="3"></th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" style="border: none;text-align:right; ">Total Fee:</th>
                                        <td >₱<?php echo number_format("$datoy"); ?></td>
                                        <th colspan="3"></th>

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
                                        <th colspan="3" style="text-align:right; border: none;">Total Fee:</th>
                                        <th style="border: none;">₱<?php  echo number_format("$datoy_1"); ?></th>
                                      

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

                                <!-- send SMS -->
                                <input type="hidden" name="sender" value="From: ISPSC-GS">
                                <input type="hidden" name="reciever" value="<?php echo $penrow['contact_number']; ?>">

                                <textarea name="msg" style="display: none;">To: <?php echo ucwords($penrow['lastname']); ?>, <?php echo ucwords($penrow['firstname']); ?> <?php echo ucwords($penrow['middlename']); ?>,&#010;&#010;Please be informed that your application for enrolment has been approved. You may now print your Assessment Form and settle your fees directly at the cashier amounting to P<?php
                                 if ($appRow['type'] == 'New'){ echo number_format("$datoy");}else{ echo number_format("$datoy_1");}  ?>. Thank you!&#010;&#010;Please do not reply! </textarea>

                                <button class="btn btn-success btn-sm" type="submit" name="statusBtn" style="float: right;"><i class="far fa-check-circle"></i> | Accept</button>
                         
                 </div>
               </div>   
            </form>
          </div> 
        </div>

</body>

</html>