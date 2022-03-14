
<?php include('head.php'); ?>
<style type="text/css">   
.inputLine {
    border: 0;
    border-bottom: 1px solid #000;
    background-color: white;
}    
</style>

<div class="wrapper">
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
                        <li>
                        <?php  
                            $navsql=mysqli_query($conn,"select * from enrollment where student_id='".$_SESSION['id']."' AND enrollment.sem_id='".$semRow['sem_id']."' AND enrollment.AY='".$syRow['school_yr_id']."' ");
                            $navRow=mysqli_fetch_array($navsql);

                        if($navRow['status']=='Accepted' || $navRow['status']=='Pending' || $navRow['status']=='Enrolled'){ ?>

                        <li>
                            <a href="enrolled_subject.php"><i class="fas fa-check-square"></i> Enrolled Subjects</a>
                        </li> 

                    <?php  } else{ ?>

                            <a href="enrollment.php"><i class="fas fa-check-square"></i> Enrollment</a>           
                    <?php  }  ?>

                        </li>
                        <li class="Active">
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
                            $syRow = mysqli_fetch_array($query)
                          ?>

                            <?php $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                            $semRow = mysqli_fetch_array($semquer);


                            $sql=mysqli_query($conn,"select * from students_account 
                                left join student on students_account.userid=student.userid 
                                left join app_for_admission on app_for_admission.userid=students_account.userid 
                                where student.userid ='".$_SESSION['id']."' AND students_account.semester='".$semRow['sem_id']."' AND students_account.school_year='".$syRow['school_yr_id']."'  ");
                            $row=mysqli_fetch_array($sql);

                          ?>
                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                            <h5><i class="fas fa-history"></i> My payment log</h5>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div class="text-xs font-weight-bold text-primary- text uppercase mb-1" style="color: #003cb3;">Amount Due: ₱ <?php echo number_format($row['fee']); ?></div>
            <div class="text-xs font-weight-bold text-primary- text uppercase mb-1" style="color: red;">Outstanding Balance: ₱ <?php echo number_format($row['balance']); ?></div>
    
            <?php
                $sq=mysqli_query($conn,"select * from student left join user on user.userid=student.userid where user.userid='".$_SESSION['id']."'");
                $crow=mysqli_fetch_array($sq);
            ?>  
                <br>

                  <table id="myTable" class=" display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px; text-align: center;">
                    <thead>
                      <tr>
                        <th>Semester</th>
                        <th>School Year</th>
                        <th>Date Of Payment</th>
                        <th>Amounts Paid</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $paySql = mysqli_query($conn, "select * from payment_history 
                            left join students_account on students_account.userid =payment_history.userid
                            left join school_year on school_year.school_yr_id=students_account.school_year
                            left join semester on semester.sem_id=students_account.semester
                            where payment_history.userid = '".$_SESSION['id']."' AND payment_history.school_yr='".$syRow['school_yr_id']."' AND payment_history.sem='".$semRow['sem_id']."' AND students_account.school_year='".$syRow['school_yr_id']."' AND students_account.semester='".$semRow['sem_id']."' ");

                        while($payRow = mysqli_fetch_array($paySql)){
                          ?>
                          <tr>
                            <td><?php echo $semRow['semester']; ?></td>
                            <td><?php echo $syRow['sy']; ?></td>
                            <td><?php echo $payRow['date_of_payment']; ?></td>
                            <td>₱ <?php echo number_format($payRow['payment']); ?></td>
                                                    
                          </tr>
                          <?php 
                        }
                      ?>
                    </tbody>
                      <tfoot>
                        <tr>
                        <th>Semester</th>
                        <th>School Year</th>
                        <th>Date Of Payment</th>
                        <th>Amounts Paid</th>
                        </tr>          
                      </tfoot>
                  </table>
                  
            </div>
        </div>
    </div>
</div>
</div>
<?php include('modal.php'); ?>
<script src="dist/js/fs-modal.min.js"></script>
</body>
</html>
