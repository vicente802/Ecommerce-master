<?php include('head.php'); ?>
<div class="wrapper">
    
<?php include('navbar.php') ?>
<div class="container-fluid">


<head>

</head>
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
                        <div>
                          <?php $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
                            $syRow = mysqli_fetch_array($query);
 
                            $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                            $semRow = mysqli_fetch_array($semquer);

                            $id= $_GET['id'];

                            $sql=mysqli_query($conn,"select * from students_account 
                                left join student on students_account.userid=student.userid 
                                left join app_for_admission on app_for_admission.userid=students_account.userid 
                                where student.userid ='$id' ");
                            $row=mysqli_fetch_array($sql);
                          ?>
                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                           <h5><i class="fas fa-user-check"></i> Enrolled Students</h5>
                        </ul>
                    </div>
                </div>
            </nav>

              <a href="enrolled_students.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
              <div style="height: 20px;"></div>
 
            
                        <div class="row" align="left">
                         <div class="col-xl-12 col-md-6 mb-4">
                           <div class="card border-left-primary shadow h-100 py-2">
                             <div class=" card-body">
                               <div class="row no-glutters align-items-center">
                                 <div class="col mr-1">
                                  <div class="text-xs font-weight-bold text-primary- text uppercase mb-1">ID: <?php echo ucwords($row['student_id']); ?></div>
                                   <div class="text-xs font-weight-bold text-primary- text uppercase mb-1">Name: <?php echo ucwords($row['lastname']); ?>, <?php echo ucwords($row['firstname']); ?> <?php echo ucwords($row['middlename']); ?></div>
                                   <div class="text-xs font-weight-bold text-primary- text uppercase mb-1">Course: <?php echo ucwords($row['student_course']); ?></div>
                                   <div class="text-xs font-weight-bold text-primary- text uppercase mb-1">Major: <?php echo ucwords($row['student_major']); ?></div>
                                 </div>
                                 <div class="col-auto">
                                    <img src="../<?php if (empty($row['image'])){echo "./upload/profile.jpg";}else{echo $row['image'];} ?>" style="width: 130px; height:130px; border-radius: 50%; " class="thumbnail">
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                         </div>


<?php 

  $sql0 = mysqli_query($conn, "select * from app_for_admission 
    left join courses on courses.program_id=app_for_admission.course
    left join major on major.major_id=app_for_admission.major
    where userid = '$id' ");
  $rowrow = mysqli_fetch_array($sql0);

  $tetst=mysqli_query($conn,"SELECT COUNT(userid) as stud_total FROM count_students 
         left join schedule on schedule.schedule_id=count_students.schedule_id
         left join subject on subject.subjects_id=schedule.subjects
         where userid= '$id' AND subject.sem_id='".$semRow['sem_id']."' AND count_students.school_yr_id='".$syRow['school_yr_id']."' ");
  $testRow = mysqli_fetch_array($tetst);
  $tot = $testRow['stud_total'];

?>
<form action="enrolled_add-drop.php<?php echo '?id='.$rowrow['userid']; ?>" method="POST" id="form1" >
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
                                                                      `count_students`.`userid`,
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
                                                                  Count(`count_students`.`schedule_id`),
                                                                      `limit_student`.`limit_student`
                                                                  FROM
                                                                      `count_students`
                                                                  Right Join `limit_student` ON `count_students`.`schedule_id` = `limit_student`.`schedule_id` AND `limit_student`.`school_yr_id` = `count_students`.`school_yr_id` AND `limit_student`.`sem_id` = `count_students`.`sem_id`
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
                                                                     Count(`count_students`.`schedule_id`) < 1
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
<br>

<form method="POST" action="update_enrolled.php?id=<?php echo $rowrow['userid']; ?>">

                              <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px; text-align: center;">
                                <thead>

                                  <tr>
                                    <th>Time (Saturday)</th>
                                    <th>Course no.</th>
                                    <th>Descriptive Title</th>
                                    <th>Units Lec</th>
                                    <th>Units Lab</th>
                                    <th>Room</th>
                                    <th>Instructor</th>
                                    <th> Drop</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $id=$_GET['id'];

                                    $query=mysqli_query($conn,"select * from count_students 
                                      left join schedule on count_students.schedule_id=schedule.schedule_id
                                      left join subject on subject.subjects_id=schedule.subjects
                                      left join instructor on instructor.instructor_id=schedule.instructor_id 
                                      where userid= '$id' AND subject.sem_id='".$semRow['sem_id']."' AND count_students.school_yr_id='".$syRow['school_yr_id']."'  ");
                                    while($subjrow=mysqli_fetch_array($query)) { ?>
                                      <tr>
                                        <td><?php echo $subjrow['time_in']; ?> - <?php echo $subjrow['time_out']; ?></td>
                                        <td><?php echo $subjrow['course_no']; ?></td>
                                        <td><?php echo $subjrow['descriptive_title']; ?></td>
                                        <td><?php echo $subjrow['units_lec']; ?></td>
                                        <td><?php echo $subjrow['units_lab']; ?></td>
                                        <td><?php echo $subjrow['room']; ?></td>
                                        <td><?php echo $subjrow['fullname']; ?></td>
                                        <td>
                                            <a href="add-drop.php<?php echo '?id='.$subjrow['enrolled_id']; ?>" style="color: red;" class="btn btn-sm" name="dropdrop"><i class="fa fa-minus-square"></i></a>
                                        </td>                           
                                      </tr>
                           <?php   } ?>

                                </tbody>
                                <tfoot>
                                    <?php 
                                        $unitsQl = mysqli_query($conn, "SELECT sum(units_lec) AS total_lec FROM schedule LEFT JOIN count_students ON schedule.schedule_id=count_students.schedule_id WHERE userid= '".$row['userid']."' AND count_students.sem_id='".$semRow['sem_id']."' AND count_students.school_yr_id='".$syRow['school_yr_id']."' ");
                                        $totalRow = mysqli_fetch_assoc($unitsQl);

                                        $unitsQl1 = mysqli_query($conn, "SELECT sum(units_lab) AS total_lab FROM schedule LEFT JOIN count_students ON schedule.schedule_id=count_students.schedule_id WHERE userid= '".$row['userid']."' AND count_students.sem_id='".$semRow['sem_id']."' AND count_students.school_yr_id='".$syRow['school_yr_id']."'  ");
                                        $totalRow1 = mysqli_fetch_assoc($unitsQl1);
                                        $feesQl = mysqli_query($conn, "SELECT sum(amount) AS total_fees FROM fees");
                                        $feeRow = mysqli_fetch_assoc($feesQl);
                                        
                                        $appSql=mysqli_query($conn, "select * from app_for_admission where userid='".$row['userid']."' ");
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

                                        <input type="text" name="balance" value="<?php echo "$datoy"; ?>" style="display: none;">

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
                                        <th style="border: none;">₱<?php echo number_format("$datoy_1"); ?></th>
                                        <th style="border: none;"></th>
                                        <th style="border: none;"></th>
                                        <th style="border: none;"></th>

                                        <input type="text" name="balance" value="<?php echo "$datoy_1"; ?>" style="display: none;">
                                <?php  } ?>
                                
                                    </tr> 

                                </tfoot>
                              </table>

                   <div style="text-align: center;">
                      <button class="btn btn-sm btn-success" type="submit" name="enUp">Update</button>
                   </div>
                  <div style="height: 20px;"></div>
            </div>
          </form>
        </div>
    </div>


<?php include('tableScript.php'); ?>

<script type="text/javascript">
 $(document).ready(function() {
    $('table.display').DataTable();
} );   
</script>
</body>
</html>


  