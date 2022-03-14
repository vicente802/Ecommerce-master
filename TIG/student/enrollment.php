<?php include('head.php'); ?>
<?php include ('outmodal.php'); ?>
<div class="wrapper">
 <head>
  <title>Table V01</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head> 
        <nav id="sidebar">
            <div class="sidebar-header">
                <?php  
                        $pic=mysqli_query($conn,"select * from student where userid='".$_SESSION['id']."'");   
                        $prow=mysqli_fetch_array($pic);

                        $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
                        $syRow = mysqli_fetch_array($query);

                        $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                        $semRow = mysqli_fetch_array($semquer);            

                        $sqid=mysqli_query($conn, "select student_id from app_for_admission where userid='".$_SESSION['id']."' ")
                ?>
                    <center><img src="../<?php if(empty($prow['image'])){echo "./upload/profile.jpg";}else{echo $prow['image'];} ?>" id="logo" class="rounded-circle" alt="Circular Image"></center><br>
                    <div class="container" style="border: 3px solid black; background-color: white; ">
                        <span style="font-size: 11px; color: black;"><strong>Name: <?php echo $fullname; ?></strong> </span><br>   
                        <span style="font-size: 10px; color: black;"><strong>Student ID: <?php echo $student_id; ?></strong> </span><br>
                    </div>    
            </div>

            <ul class="list-unstyled components" style="font-size: 13px">
                        <li>
                            <a href="student_account.php"><i class="fas fa-user-tie"></i> Student Profile</a>
                        </li>
                        <li>
                            <a href="admission.php"><i class="fab fa-black-tie"></i> Admission</a>
                        </li>
                        <li class="Active">
      
                            <a href="enrollment.php"><i class="fas fa-check-square"></i> Enrollment</a>           
                

                        </li>
                        <li>
                            <a href="student_payment_log.php"><i class="fas fa-history"></i> Payment Log</a>
                        </li>

            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="student_page.php" class="article"><i class="fas fa-home"></i> Back to Home</a>
                </li>
                 <li>
                    <a href="#logout" class="logout" data-toggle="modal"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>

  <!-- Toggle Side-bar -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

<div class="container-fluid">
<style type="text/css">


/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
  float:right;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input.success:checked + .slider {
  background-color: #8bc34a;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

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
                      
                     <div style="margin-left: 20px;">
                          <?php $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
                            $syRow = mysqli_fetch_array($query);

                            $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                            $semRow = mysqli_fetch_array($semquer);
                          ?>
                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>

                        <ul class="nav navbar-nav ml-auto">
                          <h5><i class="fas fa-book"></i> Select Subjects</h5>
                        </ul>
                    </div>
                </div>
            </nav>
                  <?php  
                        $sql=mysqli_query($conn,"select * from app_for_admission where userid='".$_SESSION['id']."'");
                        $enrow=mysqli_fetch_array($sql);

                        $stopSql=mysqli_query($conn,"select * from semester where sem_id = '4'");
                        $stopRow=mysqli_fetch_array($stopSql);

                        if (empty($enrow)) { ?>

                        <div class="row" align="center" style="margin-top: 10%;">
                         <div class="col-xl-12 col-md-6 mb-4">
                           <div class="card border-left-primary shadow h-100 py-2">
                             <div class=" card-body">
                               <div class="row no-glutters align-items-center">
                                 <div class="col mr-1">
                                   <div class="text-xs font-weight-bold text-primary- text uppercase mb-1"> You haven't filled up your Registration form yet.</div>
                                   <div class="h-5 mb-0 font-weight-bold text-gray-800">
                                    <a class="btn btn-primary" type="button"style="color: white;" href="admission.php">Proceed</a>
                                   </div>
                                 </div>
                                 <div class="col-auto">
                                   <img src="../img/no.png" width="120px;" height="120px;">
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                         </div>
              <?php } else if ($stopRow['status'] == 'Stop') { ?>
                        <div class="row" align="center" style="margin-top: 10%;">
                         <div class="col-xl-12 col-md-6 mb-4">
                           <div class="card border-left-primary shadow h-100 py-2">
                             <div class=" card-body">
                               <div class="row no-glutters align-items-center">
                                 <div class="col mr-1">
                                   <div class="text-xs font-weight-bold text-primary- text uppercase mb-1"><p style="color: red"> Sorry! the enrollment for this School Year has been closed! </p></div>
                                   <div class="h-5 mb-0 font-weight-bold text-gray-800">
                                    
                                   </div>
                                 </div>
                                 <div class="col-auto">
                                   <img src="../img/no.png" width="120px;" height="120px;">
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                         </div>
             <?php } else {  ?>
                       
                            <?php
                              $subjsql=mysqli_query($conn,"select * from courses 
                                left join app_for_admission on courses.program_id=app_for_admission.course
                                left join major on app_for_admission.major=major.major_id
                                where userid='".$_SESSION['id']."' ");
                              $courseRow=mysqli_fetch_array($subjsql); ?>
                                  <p style="font-size: 20px; color: black;"><strong><?php echo $courseRow['program']; ?></strong></p>
                                  <p style="font-size: 15px; color: black;"><strong><?php echo $courseRow['major']; ?></strong></p>
                       
                  <?php  
                        $sql=mysqli_query($conn,"select * from app_for_admission left join schedule on app_for_admission.major=schedule.schedule_id where app_for_admission.userid='".$_SESSION['id']."'");
                        $enrow2=mysqli_fetch_array($sql); ?>

                      <div class="limiter">
                        <div class="container-table100">
                          <div class="wrap-table100">
                            <div class="table100">
                              <table id="" class="">
                                <thead>
                                  <tr class="table100-head">
                                    <th class="column1">Time (Saturday)</th>
                                    <th class="column2">Course no.</th>
                                    <th class="column3">Descriptive Title</th>
                                    <th class="column4">Instructor</th>
                                    <th class="column5">Units Lec</th>
                                    <th class="column6">Units Lab</th>
                                    <th class="column7">Room</th>
                                    <th class="column8">Select </th>
                                  </tr>
                                </thead>
                                <tbody>
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
                                                                  WHERE app_for_admission.userid = '".$_SESSION['id']."' AND
                                                                    `limit_student`.`sem_id` =  '". $semRow['sem_id']."' AND
                                                                    `limit_student`.`school_yr_id` =  '". $syRow['school_yr_id']."'
                                                                  GROUP BY
                                                                    `schedule`.`room`,
                                                                    `schedule`.`subject_title`,
                                                                    `schedule`.`course_num`
                                                                  HAVING
                                                                     Count(`enrolled_subject`.`schedule_id`) < `limit_student`.`limit_student`
                                                                          ");
                                        $padas = 1;

                                        while($enrollmentRow=mysqli_fetch_array($enrolSql)){
                                          ?>
                                          <tr>
                                            <td class="column1"><?php echo $enrollmentRow['time_in']; ?>-<?php echo $enrollmentRow['time_out']; ?></td>
                                            <td class="column2"><?php echo $enrollmentRow['course_num']; ?></td>
                                            <td class="column3"><?php echo $enrollmentRow['descriptive_title']; ?></td>
                                            <td class="column4"><?php echo $enrollmentRow['fullname']; ?></td>
                                            <td class="column5"><?php echo $enrollmentRow['units_lec']; ?></td>
                                            <td class="column6"><?php echo $enrollmentRow['units_lab']; ?></td>
                                            <td class="column7"><?php echo $enrollmentRow['room']; ?></td>
                                            <td class="column8">
                                              <form action="subject-selection.php" method="POST" id="form1">
                                                <label class="switch">
                                                  <input type="checkbox" id="selectsub2" name="schedule[]" class="success" value="<?php echo $enrollmentRow['schedule_id'];?>"  >
                                                  <span class="slider round" ></span>
                                                </label>
                                                <input type="hidden" name="subject" id="sched2" class="success" value="<?php //echo $enrollmentRow['descriptive_title'];?>" >
                                                <input type="hidden" name="school_yr_id" value="<?php echo $syRow['school_yr_id'];?>">
                                                <input type="hidden" name="course" value="<?php echo $courseRow['program_id'];?>" >
                                                <input type="hidden" name="major" value="<?php echo $courseRow['major_id'];?>" >
                                                <input type="hidden" name="semester" value="<?php echo $semRow['sem_id'];?>" >
                                                <input type="hidden" name="AY" value="<?php echo $courseRow['AY'];?>" >
                                               <!--  <input type="checkbox" id="selectsub2" name="units[]" value="<?php //echo $enrollmentRow['units_lec'];?>" > -->
                                            </td>
                                        </tr>

                                      <?php $padas++; } ?>
                                    </tbody>
                                  </div>  
                              </div>
                          </div>
                      </div>
                      </table>
                      <br>
                      <div class="row">
                          <div class="container" align="center">
                            <button type="submit" name="insertion" value="Insert" id="insertion" class="btn btn-success"> Enroll Subject</button>
                          </div>
                      </div>
                    </form>
                    </div>
                    <?php } ?>

</body>
</html>

<script type="text/javascript">
   $(document).ready(function() {
    $("#selectsub").click(function(){
      $("#selectsub2").click();
    });
 });
</script>
<?php include('tableScript.php'); ?>

 <script type="text/javascript">
 $(document).ready(function() {
  $("input[name='schedule[]']").change(function(){
    var maxAllowed = 3;
      var cnt = $("input[name='schedule[]']:checked").length;
        if (cnt > maxAllowed) {
          $(this).prop("checked","");
            alert("Maximum of " + maxAllowed + " subject per student!");

        }
  });
 });
</script>

<script type="text/javascript">
 $(document).ready(function() {
    $('table.display').DataTable();
} );   
</script>


<!-- 
 /*                                 $enrollmentRow=mysqli_fetch_array($enrolSql);
                                    $enrolSql=mysqli_query($conn,"select * from schedule 
                                      left join app_for_admission on app_for_admission.major=schedule.major_id
                                      left join subject on subject.subjects_id=schedule.subjects
                                      left join instructor on instructor.instructor_id=schedule.instructor_id 
                                      where app_for_admission.userid='".$_SESSION['id']."' AND subject.sem_id='".$semRow['sem_id']."' ");*/ -->