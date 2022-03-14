<?php include('head.php'); ?>
<div class="wrapper">
  
        <nav id="sidebar">
            <div class="sidebar-header">
                <?php
                        $pic=mysqli_query($conn,"select * from cashier where userid='".$_SESSION['id']."'");
                        $prow=mysqli_fetch_array($pic);
                ?>
                    <center><img src="../<?php if(empty($prow['image'])){echo "./upload/profile.jpg";}else{echo $prow['image'];} ?>" id="logo" class="rounded-circle" alt="Circular Image" ></center ><br>
                   
            </div>

             <ul class="list-unstyled components" style="font-size: 13px;">
                <li class="active">
                    <a href="students_record.php"><i class="fas fa-money-bill-wave"></i> |  Students Account</a>
                </li>
                <li >
                    <a href="cashier_account.php"><i class="fas fa-user-tie"></i> | Cashier's Profile</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">

                 <li>
                    <a href="#logout" class="logout" data-toggle="modal"><i class="fas fa-sign-out-alt"></i> Logout</a>
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

<div class="container-fluid">
<style type="text/css">   

#here {
 background-color: transparent;   
}
.inputLine {
    border: 0;
    text-align: center;
    color: black;
    font-size: 23px;
}    
</style>

          <?php

            $yrSQl = mysqli_query($conn, "select * from school_year where status = 'Active' ");
            $syRow = mysqli_fetch_array($yrSQl);

            $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
            $semRow = mysqli_fetch_array($semquer);

             $id= $_GET['id'];

              $sql=mysqli_query($conn,"select * from students_account 
                left join student on students_account.userid=student.userid 
                left join app_for_admission on app_for_admission.userid=students_account.userid 
                where student.userid ='$id' AND students_account.semester='".$semRow['sem_id']."' AND students_account.school_year='".$syRow['school_yr_id']."'  ");
              $row=mysqli_fetch_array($sql);
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
                        <div style="margin-left: 20px;">

                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                          <h5><i class="fas fa-history"></i> Payment History</h5>
                        </ul>
                       
                    </div>
                </div>
            </nav>

              <a href="students_record.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
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
                                   <div class="text-xs font-weight-bold text-primary- text uppercase mb-4">Major: <?php echo ucwords($row['student_major']); ?></div>
                                   <div class="text-xs font-weight-bold text-primary- text uppercase mb-1" style="color: #003cb3;">Amount Due: ₱ <?php echo number_format($row['fee']); ?></div>
                                   <div class="text-xs font-weight-bold text-primary- text uppercase mb-1" style="color: red;">Outstanding Balance: ₱ <?php echo number_format($row['balance']); ?></div>
                                 </div>
                                 <div class="col-auto">
                                    <img src="../<?php if (empty($row['image'])){echo "./upload/profile.jpg";}else{echo $row['image'];} ?>" style="width: 130px; height:130px; border-radius: 50%;" class="thumbnail">
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                        </div>
                        <div style="height: 25px"></div>
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
                            where payment_history.userid = '$id' AND payment_history.school_yr='".$syRow['school_yr_id']."' AND payment_history.sem='".$semRow['sem_id']."' AND students_account.school_year='".$syRow['school_yr_id']."' AND students_account.semester='".$semRow['sem_id']."' ");

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

            <script src="dist/js/fs-modal.min.js"></script>
            <?php include('tableScript.php'); ?>
            
</body>
</html>
