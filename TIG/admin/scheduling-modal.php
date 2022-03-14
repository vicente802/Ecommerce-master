  <div class="modal fade modal-fullscreen" id="view_subject<?php echo $subjrow['schedule_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding Schedule...</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid box">
              <form method="post" action="scheduling_db.php">
                 <div class="container-fluid">  
                   <div class="container-fluid">




                   </div>
                  </div>
                              <!-- Modal footer -->
                  <div class="modal-footer">
                      <button type="submit" name="btnsub" id="btnsub" class="btn btn-success" ><i class="fa fa-save"></i> Save Section</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
   </div>
