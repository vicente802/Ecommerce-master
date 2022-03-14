<?php include('head.php'); ?>

<div class="wrapper">

        <nav id="sidebar">
            <div class="sidebar-header">
                <?php  
                        $pic=mysqli_query($conn,"SELECT * from student where userid='".$_SESSION['userid']."'");   
                        $prow=mysqli_fetch_array($pic);

                        $query = mysqli_query($conn, "SELECT * from school_year where status = 'Active' ");
                        $syRow = mysqli_fetch_array($query);

                        $semquer = mysqli_query($conn, "SELECT * from semester where status = 'Active' ");
                        $semRow = mysqli_fetch_array($semquer);            

                        
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
                        <li>
                        <?php  
                            $navsql=mysqli_query($conn,"select * from enrollment where student_id='".$_SESSION['userid']."' AND enrollment.sem_id='".$semRow['sem_id']."' AND enrollment.AY='".$syRow['school_yr_id']."' ");
                            $navRow=mysqli_fetch_array($navsql);

                        if($navRow['status']=='Accepted' || $navRow['status']=='Pending' || $navRow['status']=='Enrolled'){ ?>

                        <li class="Active">
                            <a href="enrolled_subject.php"><i class="fas fa-check-square"></i> Enrolled Subjects</a>
                        </li> 

                    <?php  } else{ ?>

                            <a href="enrollment.php"><i class="fas fa-check-square"></i> Enrollment</a>           
                    <?php  }  ?>

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
  body{
    background: linear-gradient(to bottom, white 0%, #79a6d2 360%);
  }
</style>

  <?php 
    $query = mysqli_query($conn, "SELECT * from enrolled_subject where userid = '".$_SESSION['userid']."' ");
    $ledRow = mysqli_fetch_array($query);

    $qwe = mysqli_query($conn, "SELECT * from count_students where userid = '".$_SESSION['userid']."' ");
    $qweRow = mysqli_fetch_array($qwe);

    $query = mysqli_query($conn, "SELECT * from school_year where status = 'Active' ");
    $syRow = mysqli_fetch_array($query);

    $semquer = mysqli_query($conn, "SELECT * from semester where status = 'Active' ");
    $semRow = mysqli_fetch_array($semquer);
 
  ?>

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
                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                          <h5><i class="fas fa-book"></i> Subjects</h5>
                        </ul>

                    </div>
                </div>
            </nav>
                  <?php  
                        $sql=mysqli_query($conn,"select * from enrollment where student_id='".$_SESSION['userid']."' AND sem_id='".$semRow['sem_id']."'   ");
                        $pendrow=mysqli_fetch_array($sql); 

                        if($pendrow['status'] == 'Pending'){ ?>

                            
                              <table id="myTable1" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px; text-align: center;border: none;">
                                <thead style="border: none;">
                                  <tr style="background-color: #4da6ff; color: white">
                                    <th style="border: none;" width="20%">Time (Saturday)</th>
                                    <th style="border: none;" width="13%">Course no.</th>
                                    <th style="border: none;" width="26%">Descriptive Title</th>
                                    <th style="border: none;" width="11%">Units</th>
                                    <th style="border: none;" width="15%">Room</th>
                                    <th style="border: none;" width="24%">Instructor</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $query=mysqli_query($conn,"select * from enrolled_subject 
                                      left join schedule on enrolled_subject.schedule_id=schedule.schedule_id
                                      left join subject on subject.subjects_id=schedule.subjects
                                      left join instructor on instructor.instructor_id=schedule.instructor_id 
                                      where userid= '".$ledRow['userid']."' AND subject.sem_id='".$semRow['sem_id']."' ");
                                    while($subjrow=mysqli_fetch_array($query)) { ?>
                                      <tr>
                                        <td style="border: none;"><?php echo $subjrow['time_in']; ?> - <?php echo $subjrow['time_out']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['course_no']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['descriptive_title']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['units_lec']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['room']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['fullname']; ?></td>
                                      </tr>
                           <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <?php 
                                        $unitsQl = mysqli_query($conn, "SELECT sum(units_lec) AS total_lec FROM schedule LEFT JOIN enrolled_subject ON schedule.schedule_id=enrolled_subject.schedule_id WHERE userid = '".$_SESSION['userid']."' AND enrolled_subject.sem_id='".$semRow['sem_id']."' AND enrolled_subject.school_yr_id='".$syRow['school_yr_id']."' ");
                                        $totalRow = mysqli_fetch_assoc($unitsQl);

                                        $unitsQl1 = mysqli_query($conn, "SELECT sum(units_lab) AS total_lab FROM schedule LEFT JOIN enrolled_subject ON schedule.schedule_id=enrolled_subject.schedule_id WHERE userid = '".$_SESSION['userid']."' AND enrolled_subject.sem_id='".$semRow['sem_id']."' AND enrolled_subject.school_yr_id='".$syRow['school_yr_id']."'  ");
                                        $totalRow1 = mysqli_fetch_assoc($unitsQl1);

                                        $appSql=mysqli_query($conn, "select * from app_for_admission where userid='".$_SESSION['userid']."' ");
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
                                <?php  } ?>
                                    </tr>  
                                </tfoot>
                              </table>

                       <?php }else { ?>

                              <table id="myTable1" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px;border: none;" >
                                <thead >

                                  <tr style="background-color: #4da6ff; color: white">
                                    <th style="border: none;" width="20%">Time (Saturday)</th>
                                    <th style="border: none;" width="13%">Course no.</th>
                                    <th style="border: none;" width="26%">Descriptive Title</th>
                                    <th style="border: none;" width="11%">Units</th>
                                    <th style="border: none;" width="15%">Room</th>
                                    <th style="border: none;" width="24%">Instructor</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php

                                    $query=mysqli_query($conn,"select * from count_students 
                                      left join schedule on count_students.schedule_id=schedule.schedule_id
                                      left join subject on subject.subjects_id=schedule.subjects
                                      left join instructor on instructor.instructor_id=schedule.instructor_id 
                                      where userid= '".$qweRow['userid']."' AND subject.sem_id='".$semRow['sem_id']."' AND count_students.school_yr_id='".$syRow['school_yr_id']."'  ");
                                    while($subjrow=mysqli_fetch_array($query)) { ?>
                                      <tr>
                                        <td style="border: none;"><?php echo $subjrow['time_in']; ?> - <?php echo $subjrow['time_out']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['course_no']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['descriptive_title']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['units_lec']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['room']; ?></td>
                                        <td style="border: none;"><?php echo $subjrow['fullname']; ?></td>
                                      </tr>
                           <?php   } ?>

                                </tbody>
                                <tfoot>
                                    <?php 
                                        $unitsQl = mysqli_query($conn, "SELECT sum(units_lec) AS total_lec FROM schedule LEFT JOIN count_students ON schedule.schedule_id=count_students.schedule_id WHERE userid = '".$_SESSION['userid']."' AND count_students.sem_id='".$semRow['sem_id']."' AND count_students.school_yr_id='".$syRow['school_yr_id']."' ");
                                        $totalRow = mysqli_fetch_assoc($unitsQl);

                                        $unitsQl1 = mysqli_query($conn, "SELECT sum(units_lab) AS total_lab FROM schedule LEFT JOIN count_students ON schedule.schedule_id=count_students.schedule_id WHERE userid = '".$_SESSION['userid']."' AND count_students.sem_id='".$semRow['sem_id']."' AND count_students.school_yr_id='".$syRow['school_yr_id']."'  ");
                                        $totalRow1 = mysqli_fetch_assoc($unitsQl1);
                                        $feesQl = mysqli_query($conn, "SELECT sum(amount) AS total_fees FROM fees");
                                        $feeRow = mysqli_fetch_assoc($feesQl);
                                        
                                        $appSql=mysqli_query($conn, "select * from app_for_admission where userid='".$_SESSION['userid']."' ");
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
                                <?php  } ?>
                                    </tr>                                
                              </table>
                        
                   <?php  } ?>

                          <?php 
                              $statuSql = mysqli_query($conn, "select * from enrollment where student_id='".$_SESSION['userid']."' AND enrollment.sem_id='".$semRow['sem_id']."' AND enrollment.AY='".$syRow['school_yr_id']."'  ");
                              $statusRow = mysqli_fetch_assoc($statuSql);

                          if ($statusRow['status'] == 'Pending') { ?>

                              <div class="row" align="center">
                                
                                 <div class="col-xl-12 col-md-6 mb-4">
                                   <div class="card border-left-primary shadow h-100 py-2">
                                     <div class=" card-body">
                                       <div class="row no-glutters align-items-center">
                                         <div class="col mr-2">
                                           <div class="text-xs font-weight-bold text-primary- text uppercase mb-1"> Status</div>
                                           <div class="h-5 mb-0 font-weight-bold text-gray-800">
                                              <h3 style="color: red;">Pending Approval..</h3>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                                 
                              </div>

                        <?php  }if($statusRow['status'] == 'Accepted'){ ?>
                              <div class="row" align="center">
                                 <div class="col-xl-12 col-md-6 mb-4">
                                   <div class="card border-left-primary shadow h-100 py-2">
                                     <div class=" card-body">
                                       <div class="row no-glutters align-items-center">
                                         <div class="col mr-2">
                                           <div class="text-xs font-weight-bold text-primary- text uppercase mb-1"> Status</div>
                                           <div class="h-5 mb-0 font-weight-bold text-gray-800">
                                              <h3 style="color: green;">Approved</h3>
                                              <hr>
                                              <form action="print_student_subjects.php<?php echo '?id='.$qweRow['userid']; ?>" method="POSt">
                                                <button class="btn btn-primary btn-sm" style="text-align: center;" name="generate_shced"><i class="fas fa-print"></i> PRINT</button>
                                              </form>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                              </div>
                      <?php } else if ($statusRow['status'] == 'Enrolled') { ?>
                              <div class="row" align="center">
                                 <div class="col-xl-12 col-md-6 mb-4">
                                   <div class="card border-left-primary shadow h-100 py-2">
                                     <div class=" card-body">
                                       <div class="row no-glutters align-items-center">
                                         <div class="col mr-2">
                                           <div class="text-xs font-weight-bold text-primary- text uppercase mb-1"> Status</div>
                                           <div class="h-5 mb-0 font-weight-bold text-gray-800">
                                              <h3 style="color: green;">Enrolled</h3>
                                              <hr>
                                              <form action="print_student_subjects.php<?php echo '?id='.$qweRow['userid']; ?>" method="POSt">
                                                <button class="btn btn-primary btn-sm" style="text-align: center;" name="generate_shced"><i class="fas fa-print"></i> PRINT</button>
                                              </form>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                              </div>

                    <?php  } ?>  
            </div>  
        </div>
    </div>
</div>
  
</body>
</html>



<?php include('tableScript.php'); ?>


<script type="text/javascript">
 $(document).ready(function() {
    $('table.display').DataTable();
} );   
</script>


<!--
<script type="text/javascript">

  function show_courses(){
    var selectCourse = document.getElementById("program_id").value;
    console.log(selectCourse);
  }
  show_courses();
</script>  