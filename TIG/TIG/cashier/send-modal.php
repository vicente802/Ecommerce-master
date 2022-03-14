  <div class="modal fade modal-fullscreen" id="send_<?php echo $recRow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Notify Student</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid box" style="text-align: left;">
                <form action="send-sms-db.php" method="POST">
                  <div class="form-group">
                    <label >Sender Name</label>
                    <input type="text" class="form-control" id="sender" name="sender" placeholder="Enter sender name" maxlength="10" value="From: ISPSC Tagudin Campus">
                  </div>

                  <div class="form-group">
                    <label>Mobile number of student</label>
                    <input type="text" class="form-control" id="reciever" name="reciever" value="<?php echo $recRow['contact_number']; ?>" placeholder="Reciever"  style="background-color: transparent;">
                  </div>

                 <div class="form-group">
                    <label>Messege</label>
                    <textarea class="form-control" rows="7" name="msg" placeholder="Messege here..." >&#010;&#010;&#010;Dear <?php echo $recRow['fullname']; ?>, Our records indicate that you have an outstanding balance of ₱ <?php echo number_format($recRow['balance']) ?>.  Please settle before your final exam... Thank you!&#010;&#010;&#010; *Please do not reply!</textarea>
                  </div>

                  <button type="submit" name="sendSMS" class="btn btn-primary btn-sm">Send</button>
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> Cancel</button>
                </form>
              </div> 
            </div>
          </div>
        </div>
      </div>
