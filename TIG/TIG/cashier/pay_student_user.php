<!-- Edit Admin Profile Modal -->
<style type="text/css">   
.inputLine {
    background-color: transparent;
  }   
</style>


<div class="modal fade" id="pay_<?php echo $recRow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargespan"> Student Account</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">

          <?php
              $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
              $syRow = mysqli_fetch_array($query);

              $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
              $semRow = mysqli_fetch_array($semquer);

              $feeSql=mysqli_query($conn,"select * from students_account 
                left join student on students_account.userid=student.userid 
                left join app_for_admission on app_for_admission.userid=students_account.userid 
                where student.userid ='".$recRow['userid']."' AND students_account.semester='".$semRow['sem_id']."' AND students_account.school_year='".$syRow['school_yr_id']."'  ");
              $feeROw=mysqli_fetch_array($feeSql);
          ?>

                 <div class="row" style="margin-bottom: 4%;">
                     <div class="col-sm-12">
                       <form action="payment.php?id=<?php echo $recRow['userid']; ?>" method="POSt">
                       <br> 

                      <div class="row" align="center">
                        <div class="col-sm-12" style="margin-top: -10px;">
                          <img src="../<?php if(empty($feeROw['image'])){echo "./upload/profile.jpg";}else{echo $feeROw['image'];} ?>" id="pic" class="thumbnail" alt="Circular Image" style="height: 150px; width: 150px;">
                        </div>                           
                      </div>
                      <br>

                      <div class="row" style="margin-bottom: 4%;" align="center">
                        <div class="col-sm-12">
                          <input type="text" name="student_id" class="form-control inputLine" value="<?php echo $feeROw['student_id']; ?>" readonly style=" text-align: center; background-color: transparent;">  
                          <center><span><small>Student ID</small></span></center>
                        </div>
                      </div>

                      <div class="row" style="margin-bottom: 4%;">
                        <div class="col-sm-6">
                          <input class="form-control inputLine" id="fee" readonly="" type="text" name="fee" value="<?php echo $semRow['semester']; ?>" style=" text-align: center; background-color: transparent;">
                          <center><span><small>Semester</small></span></center>
                        </div>

                        <div class="col-sm-6">
                          <input class="form-control inputLine" id="fee" readonly="" type="text" name="fee" value="<?php echo $syRow['sy']; ?>" style=" text-align: center; background-color: transparent;">
                          <center><span><small>School Year</small></span></center>
                        </div>
                      </div>

                      <div class="row" style="margin-bottom: 4%;">
                        <div class="col-sm-12">
                          <input class="form-control inputLine" style=" text-align: center; background-color: transparent;" id="fee" readonly="" type="text" name="fee" value="<?php echo $feeROw['fullname']; ?>">
                           <center><span><small>Fullname</small></span></center>
                        </div>
                      </div>

                      <div class="row" style="margin-bottom: 4%;">
                        <div class="col-sm-12">
                          <input class="form-control inputLine" style=" text-align: center; background-color: transparent;" id="fee" readonly="" type="text" name="fee" value="<?php echo $feeROw['permanent_address']; ?>">
                           <center><span><small>Address</small></span></center>
                        </div>
                      </div>

                      <div class="row" style="margin-bottom: 4%;">
                        <div class="col-sm-6">
                          <input class="form-control inputLine" id="fee" readonly="" type="text" name="fee" value="<?php echo $feeROw['student_course']; ?>" style=" text-align: center; background-color: transparent;">
                          <center><span><small>Course</small></span></center>
                        </div>

                        <div class="col-sm-6">
                          <input class="form-control inputLine" id="fee" readonly="" type="text" name="fee" value="<?php echo $feeROw['student_major']; ?>"style=" text-align: center; background-color: transparent;">
                          <center><span><small>Major</small></span></center>
                        </div>
                      </div>

                      <div class="line"></div>

                      <label style="margin-top: -6%; float: left;">Student Type: <strong><?php echo $feeROw['type']; ?></strong></label>
                      <div class="row" style="margin-bottom: 4%;margin-top: 9%;">
                        <div class="col-sm-6">
                          <input class="form-control inputLine" id="fee" readonly="" type="text" name="fee" value="₱ <?php echo number_format($feeROw['fee']); ?>" style="font-size: 20px; color: #009933; text-align: center;">
                           <center><span>Amount Due</span></center>
                        </div>

                        <div class="col-sm-6">
                          <input class="form-control inputLine" id="balance" readonly="" type="text" name="balance" value="<?php echo $feeROw['balance']; ?>" style="font-size: 20px; color: red; font-weight: bold; text-align: center;">
                          <center><span>Outstanding Balance</span></center>
                        </div>
                      </div>

                      <input type="hidden" name="sem" value="<?php echo $semRow['sem_id']; ?>">
                      <input type="hidden" name="yr" value="<?php echo $syRow['school_yr_id']; ?>">

                      <div class="row" style="margin-bottom: 10%;" align="center">
                        <div class="col-sm-12">
                          <input type="number" class="form-control inputLine" name="payment" style="font-size: 30px;" required="">
                          <center><span>Payment</span></center>
                        </div>
                      </div>

                                <!-- send SMS -->
                                <input type="hidden" name="sender" value="From: ISPSC-GS">
                                <input type="hidden" name="reciever" value="<?php echo $recRow['contact_number']; ?>">

                                <textarea name="msg" style="display: none;">To: <?php echo ucwords($feeROw['fullname']); ?>, &#010;&#010;Congratulations! you are now successfully enrolled at ISPSC Graduate School. </textarea>

                     </div>
                   </div>
                              <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm" id="payBtn" name="payBtn"><i class="far fa-money-bill-alt"></i> | Pay</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> | Cancel</button>
                    </div>     
                </div>                    
                  </form>
            </div> 
        </div>
      </div>
    </div>
  </div>  


