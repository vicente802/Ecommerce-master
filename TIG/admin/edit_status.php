<style>
  .hid{
    display: none;
  }
</style>  

  <div class="modal fade modal-fullscreen" id="editstat_<?php echo $trow['userid']; ?>" tabindex="-1" role="dialog" aria-spanledby="modalLargespan">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargespan"> Account Confirmation</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">

          <?php
              $sq=mysqli_query($conn,"select * from enrollment 
                left join student on student.userid=enrollment.student_id 
                where enrollment.student_id ='".$trow['userid']."'");
              $edrow01=mysqli_fetch_array($sq);
          ?>

                <form role="form" method="POST" action="update_status.php?id=<?php echo $trow['userid']; ?>" enctype="multipart/form-data">
               <div class="container-fluid">  
                 <div class="container-fluid">

                  <div class="row">

                      <input class="form-control" id="form_uname" required="" type="hidden" name="username" placeholder="Username" value="<?php echo ($edrow01['username']); ?>">

                      <input type="hidden"  placeholder="Fullname" name="fullname" class="form-control" id="form_fname" required="" value="<?php echo ucwords($edrow01['fullname']); ?>">

                        <input type="hidden" placeholder="Contact number" name="contact_number" class="form-control" id="form_contact_number" required="" value="<?php echo ($edrow01['contact_number']); ?>">

                        <input type="hidden"  placeholder="Password" name="password" class="form-control" id="form_password" required="" value="<?php echo ($edrow01['password']); ?>">

                        <input type="file" name="image" class="hid" value="<?php echo ($edrow01['image']); ?>">  

                        <span style="color: #4080bf; margin-bottom: 15px;">Change Status</span>

                        <select name="status" class="form-control">
                          <option value="Accepted">Accept</option>
                          <option value="Rejected">Reject</option>
                        </select>

                   </div>
                   <br>
                            <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn" id="edit" name="statusChange"><i class="fa fa-save"></i> Confirm</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cancel</button>
                    </div>  
                 </div>
               </div>   
            </form>
          </div> 
        </div>
        

      </div>
    </div>
  </div>  


<style>
  .hid{
    display: none;
  }
</style>  

  <div class="modal fade modal-fullscreen" id="editstat_<?php echo $penrow['userid']; ?>" tabindex="-1" role="dialog" aria-spanledby="modalLargespan">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargespan"> Account Confirmation</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">

          <?php
              $sq=mysqli_query($conn,"select * from enrollment 
                left join student on student.userid=enrollment.student_id 
                where enrollment.student_id ='".$penrow['userid']."'");
              $penrow0=mysqli_fetch_array($sq);
          ?>

                <form role="form" method="POST" action="update-enrollee-status.php?id=<?php echo $penrow['userid']; ?>" enctype="multipart/form-data">
               <div class="container-fluid">  
                 <div class="container-fluid">

                  <div class="row">

                      <input class="form-control" id="form_uname" required="" type="hidden" name="username" placeholder="Username" value="<?php echo ($penrow0['username']); ?>">

                      <input type="hidden"  placeholder="Fullname" name="fullname" class="form-control" id="form_fname" required="" value="<?php echo ucwords($penrow0['fullname']); ?>">

                        <input type="hidden" placeholder="Contact number" name="contact_number" class="form-control" id="form_contact_number" required="" value="<?php echo ($penrow0['contact_number']); ?>">

                        <input type="hidden"  placeholder="Password" name="password" class="form-control" id="form_password" required="" value="<?php echo ($penrow0['password']); ?>">

                        <input type="file" name="image" class="hid" value="<?php echo ($penrow0['image']); ?>">  

                        <span style="color: #4080bf; margin-bottom: 15px;">Change Statusss</span>

                        <select name="status1" class="form-control">
                          <option value="Accepted">Accept</option>
                          <option value="Rejected">Reject</option>
                        </select>

                   </div>
                   <br>
                            <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn" id="edit" name="status"><i class="fa fa-save"></i> Confirm</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cancel</button>
                    </div>  
                 </div>
               </div>   
            </form>
          </div> 
        </div>
        

      </div>
    </div>
  </div>  
