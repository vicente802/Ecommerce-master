<?php include('head.php'); ?>
<div class="wrapper">
    
        <nav id="sidebar">
            <div class="sidebar-header">
                <?php
                        $pic=mysqli_query($conn,"select * from admin where userid='".$_SESSION['id']."'");
                        $prow=mysqli_fetch_array($pic);
                ?>
                    <center><img src="../<?php if(empty($prow['image'])){echo "./upload/profile.jpg";}else{echo $prow['image'];} ?>" id="logo" class="rounded-circle" alt="Circular Image" ></center ><br>

                    <div class="container" style="background-color: transparent;">
                         <center><strong><p style="font-size: 15px; color: white;"><?php echo $fullname; ?></p></strong></center>
                    </div>
            </div>

             <ul class="list-unstyled components" style="font-size: 13px;">
                <li>
                    <a href="admin_page.php" class=""><i class="fas fa-home"></i> | Admin Dashboard</a>
                </li>
                <li>
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-folder-open"></i> | Admin Files</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu1">
                        <li>
                            <a href="list-subjects.php"><i class="fas fa-book"></i> | Manage Subjects</a>
                        </li>                        
                        <li>
                            <a href="scheduling.php"><i class="fas fa-clock"></i> | Scheduling</a>
                        </li>
                        <li>
                            <a href="school_year.php"><i class="far fa-calendar-alt"></i> | Session</a>
                        </li>

                    </ul>
                </li>

        <li class="">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> | Users</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu2">
                        <li>
                            <a href="admin_user.php"><i class="fas fa-user-friends"></i> | Admin</a>
                        </li>
                        <li>
                            <a href="cashier_users.php"><i class="fas fa-cash-register"></i> | Cashier</a>
                        </li>
                        <li>
                            <a href="scheduling.php"><i class="fas fa-chalkboard-teacher"></i> | Instructor</a>
                        </li>
                    </ul>
                </li>

                <li>
                <?php $ensql=mysqli_query($conn,"select * from enrollment where status='Pending'"); $enrolrow=mysqli_fetch_array($ensql);
                    
                    if ($enrolrow == 0) { ?>
                        <a href="pending-enrollment.php"><i class="fas fa-bell-slash"></i> | Pending Request</a> <span></span>            
             <?php }else{ ?>
                        <a href="pending-enrollment.php"><i class="fa fa-bell" aria-hidden="true"></i> | Pending Request <span id="count-enrolled" class="badge badge-danger"></span></a>
             <?php }  ?>

                </li>
                <li  class="Active">
                    <a href="enrolled_students.php"><i class="fas fa-chart-bar"></i> | Enrolled Students</a>
                </li>
                <li>
                    <a href="admin_account.php"><i class="fas fa-cogs"></i> | Admin account</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                 <li>
                    <a href="#logout" class="logout" data-toggle="modal"><i class="fas fa-sign-out-alt"></i> | Logout</a>
                </li>
            </ul>
        </nav>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>
<script type="text/javascript">
    function loadDoc() {

    setInterval(function(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
                
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("count-enrolled").innerHTML = this.responseText;
        }
    };
            xhttp.open("GET", "count-enrolled-subjects.php", true);
            xhttp.send(); 
        },1000)

    }
    loadDoc();
    </script>
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
                        <?php 
                            $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
                            $syRow = mysqli_fetch_array($query);
      
                            $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                            $semRow = mysqli_fetch_array($semquer);


                            $firstSql1=mysqli_query($conn,"select * from semester where sem_id = '1' ");
                            $firstRow1 = mysqli_fetch_array($firstSql1);

                            $firstSql2=mysqli_query($conn,"select * from semester where sem_id = '2' ");
                            $firstRow2 = mysqli_fetch_array($firstSql2);

                            $firstSql3=mysqli_query($conn,"select * from semester where sem_id = '3' ");
                            $firstRow3 = mysqli_fetch_array($firstSql3);;

                          ?>
                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                          <h5><i class="fas fa-chart-bar"></i> Enrolled Students</h5>
                        </ul>
                    </div>
                </div>
            </nav>

              <?php 

                if ($semRow == $firstRow1 ) { ?>
                  
                  <div class="container">
                    <div class="col-xl-12">
                        <div>
                        <?php
                          $inc=0;

                          $studSql=mysqli_query($conn,"select * from student left join app_for_admission on student.userid=app_for_admission.userid left join enrollment on student.userid=enrollment.student_id where enrollment.status = 'Accepted' AND enrollment.sem_id='1'  " );
                          while($row=mysqli_fetch_array($studSql)){

                            $inc = ($inc == 6) ? 1 : $inc+1;
                            if($inc == 1) echo "<div class='row'>";

                            ?>
                              <div class="col-sm-2" align="center">
                                <img src="../<?php if (empty($row['image'])){echo "./upload/profile.jpg";}else{echo $row['image'];} ?>" style="width: 130px; height:130px; border-radius: 50%;" class="thumbnail">

                                <div style="height: 5px"></div>

                                <div style="width: 120px;"><a href="view_enrolled_students.php<?php echo '?id='.$row['userid']; ?>" class="btn btn-primary btn-sm" style="color: white">View Student</a></div>

                                <div style="width: 120px;"><?php echo $row['fullname']; ?></div>

                              </div>
                            <?php
                          if($inc == 6) echo "</div><div style='height: 30px;'></div>";
                          }

                          if($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
                          if($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
                          if($inc == 3) echo "<div class='col-lg-3'></div></div>";
                        ?>
                        </div>
                      </div>
                    </div>

            <?php } elseif ($semRow == $firstRow2) { ?>
                  <div class="container">
                    <div class="col-xl-12">
                        <div>
                        <?php
                          $inc=0;
                          $studSql=mysqli_query($conn,"select * from student left join app_for_admission on student.userid=app_for_admission.userid left join enrollment on student.userid=enrollment.student_id where enrollment.status = 'Accepted' AND enrollment.sem_id='2'  " );
                          while($row=mysqli_fetch_array($studSql)){

                            $inc = ($inc == 6) ? 1 : $inc+1;
                            if($inc == 1) echo "<div class='row'>";

                            ?>
                              <div class="col-sm-2" align="center">
                                <img src="../<?php if (empty($row['image'])){echo "./upload/profile.jpg";}else{echo $row['image'];} ?>" style="width: 130px; height:130px; border-radius: 50%;" class="thumbnail">

                                <div style="height: 5px"></div>

                                <div style="width: 120px;"><a href="view_enrolled_students.php<?php echo '?id='.$row['userid']; ?>" class="btn btn-primary btn-sm" style="color: white">View Student</a></div>

                                <div style="width: 120px;"><?php echo $row['fullname']; ?></div>
                                
                              </div>
                            <?php
                          if($inc == 6) echo "</div><div style='height: 30px;'></div>";
                          }

                          if($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
                          if($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
                          if($inc == 3) echo "<div class='col-lg-3'></div></div>";
                        ?>
                        </div>
                      </div>
                    </div>
          <?php  } elseif ($semRow == $firstRow3) { ?>
                  <div class="container">
                    <div class="col-xl-12">
                        <div>
                        <?php
                          $inc=0;
                          $studSql=mysqli_query($conn,"select * from student left join app_for_admission on student.userid=app_for_admission.userid left join enrollment on student.userid=enrollment.student_id where enrollment.status = 'Accepted' AND enrollment.sem_id='3'  " );
                          while($row=mysqli_fetch_array($studSql)){

                            $inc = ($inc == 6) ? 1 : $inc+1;
                            if($inc == 1) echo "<div class='row'>";

                            ?>
                              <div class="col-sm-2" align="center">
                                <img src="../<?php if (empty($row['image'])){echo "./upload/profile.jpg";}else{echo $row['image'];} ?>" style="width: 130px; height:130px; border-radius: 50%;" class="thumbnail">
                                <div style="height: 10px"></div>
                                <div><a href="view_enrolled_students.php<?php echo '?id='.$row['userid']; ?>" class="btn btn-primary btn-sm" style="color: white">View Student</a></div>
                                <div><?php echo $row['fullname']; ?></div>
                              </div>
                            <?php
                          if($inc == 6) echo "</div><div style='height: 30px;'></div>";
                          }

                          if($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
                          if($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
                          if($inc == 3) echo "<div class='col-lg-3'></div></div>";
                        ?>
                        </div>
                      </div>
                    </div>
   
          <?php } ?>
                                                                   WHERE count_students.sem_id='1' 
                                                                   AND count_students.school_yr_id='".$syRow['school_yr_id']."'
       
            </div>
        </div>
    </div>
    <?php include('tableScript.php'); ?>
    <script src="dist/js/fs-modal.min.js"></script>
</body>
</html>
<script src="dist/js/fs-modal.min.js"></script>
<?php include('tableScript.php'); ?>


<script type="text/javascript">
 $(document).ready(function() {
    $('table.display').DataTable();
} );   
</script>

  