<?php 
    $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
    $syRow = mysqli_fetch_array($query);

    $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
    $semrow = mysqli_fetch_array($semquer);
?>

                  <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px; text-align: center;">
                    <thead>
                      <tr>
                        <th>Fullname</th>
                        <th>Contact No.</th>
                        <th>Course</th>
                        <th>Major</th>
                        <th>Semester</th>
                        <th>Balance</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $query1=mysqli_query($conn,"select * from students_account 
                          left join student on students_account.userid=student.userid
                          left join school_year on school_year.school_yr_id=students_account.school_year
                          left join semester on semester.sem_id=students_account.semester
                          left join user on user.userid=students_account.userid WHERE semester.sem_id='".$semrow['sem_id']."' AND school_year.school_yr_id='".$syRow['school_yr_id']."' ");
                        while($recRow=mysqli_fetch_array($query1)){
                          ?>
                          <tr>
                            <td width="20%"><?php echo $recRow['fullname']; ?></td>
                            <td width="14%"><?php echo $recRow['contact_number']; ?></td>
                            <td><?php echo $recRow['student_course']; ?></td>
                            <td><?php echo $recRow['student_major']; ?></td>
                            <td><?php echo $recRow['semester']; ?></td>
                            <td width="6%"><?php 
                             if ($recRow['balance'] == 0) { ?>
                                 <p style="color: green; font-size: 12PX;">FULLY PAID!</p> 
                             <?php }else{ 
                                echo '₱'. number_format($recRow['balance']); 
                             }

                            ?></td>
                            <td width="15%">
                              <?php if ($recRow['balance'] == 0) { ?>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#pay_<?php echo $recRow['userid']; ?>" disabled><i class="fab fa-amazon-pay"></i></button>
                                <?php include('pay_student_user.php'); ?>

                            <?php }else{ ?>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#pay_<?php echo $recRow['userid']; ?>"><i class="fab fa-amazon-pay"></i></button>
                                <?php include('pay_student_user.php'); ?>

                          <?php  } ?>

                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#send_<?php echo $recRow['userid']; ?>"><i class="far fa-envelope"></i></button>
                                <?php include('send-modal.php'); ?>
                                
                                <a class="btn btn-primary btn-sm" type="submit" role="button" href="payment_history.php?id=<?php echo $recRow['userid']; ?>
                                "><i class="fas fa-history"></i></a>
                                <!--<?php //include('send_sms_user.php'); ?> -->
                            </td>                              
                          </tr>
                          <?php 
                        }
                      ?>
                    </tbody>
                      <tfoot>
                        <tr>
                        <th>Fullname</th>
                        <th>Contact No.</th>
                        <th>Course</th>
                        <th>Major</th>
                        <th>Semester</th>
                        <th>Balance</th>
                        <th>Action</th>
                        </tr>          
                      </tfoot>
                  </table>
            <!---------------------------------------------------------END DATATABLE ----------------------------------------------------------->   
       
