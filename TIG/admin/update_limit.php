 <!-- Delete subjects -->
    <div class="modal fade modal-fullscreen" id="update_limit<?php echo $Nrow['limit_student']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Deleting Subject</h5></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
          <?php
            $a=mysqli_query($conn,"select * from subject where subjects_id='".$subjrow['subjects_id']."'");
            $b=mysqli_fetch_array($a);
          ?>
         <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this subject??</p><center>
          <h6><center>Subject name: <strong><?php echo ($b['descriptive_title']); ?></strong></center></h6>
          <form role="form" method="POST" action="delete-subject.php<?php echo '?id='.$subjrow['subjects_id']; ?>">
        </div>                 
          </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> | Delete</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> | Cancel</button>
          </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->