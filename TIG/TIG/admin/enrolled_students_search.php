<?php include('head.php'); ?>
<div class="wrapper">
<?php include('navbar.php') ?>
<div class="container-fluid">
<?php 
  $name=$_POST['search_student']; 
?>

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
                          <h5><i class="fas fa-user-check"></i> Enrolled Students</h5>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container" align="center">
                  <ul class=" nav navbar-nav">
                      <form class="navbar-form" role="search" method="POST" action="enrolled_students_search.php">
                      <div class="input-group" id="searchbox" style="width:80%;">
                        <input type="text" class="form-control" placeholder="Search Student..." name="search_student" id="search">
                        <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                      </form>
                    </li>
                  </ul>
            </div>
                  <br>
              <?php 

                if ($semRow == $firstRow1 ) { ?>

                  <div class="container">
                    <div class="col-xl-12">
                        <div>
                        <?php
                          $inc=0;
                          $studSql=mysqli_query($conn,"select * from student left join app_for_admission on student.userid=app_for_admission.userid left join enrollment on student.userid=enrollment.student_id where student.fullname like '%$name%' AND enrollment.status = 'Enrolled' AND enrollment.sem_id='1' AND enrollment.AY='".$syRow['school_yr_id']."' " );
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
                          $studSql=mysqli_query($conn,"select * from student left join app_for_admission on student.userid=app_for_admission.userid left join enrollment on student.userid=enrollment.student_id where student.fullname like '%$name%' AND enrollment.status = 'Enrolled' AND enrollment.sem_id='2' AND enrollment.AY='".$syRow['school_yr_id']."' " );
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
                          $studSql=mysqli_query($conn,"select * from student left join app_for_admission on student.userid=app_for_admission.userid left join enrollment on student.userid=enrollment.student_id where  student.fullname like '%$name%' AND enrollment.status = 'Enrolled' AND enrollment.sem_id='3' AND enrollment.AY='".$syRow['school_yr_id']."' " );
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

  