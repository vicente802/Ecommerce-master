 
 <!-- Delete cashier -->
    <div class="modal fade modal-fullscreen" id="del_cashier<?php echo $trow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Deleting User</h5></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
          <?php
            $a=mysqli_query($conn,"select * from cashier where userid='".$trow['userid']."'");
            $b=mysqli_fetch_array($a);
          ?>
         <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this user??</p><center>
          <h6><center>Cashier name: <strong><?php echo ucwords($b['fullname']); ?></strong></center></h6>
          <form role="form" method="POST" action="delete-cashier.php<?php echo '?id='.$b['userid']; ?>">
        </div>                 
          </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

 <!-- Delete instructor -->
    <div class="modal fade modal-fullscreen" id="del_instructor<?php echo $trow['instructor_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Deleting User</h5></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
          <?php
            $a=mysqli_query($conn,"select * from instructor where instructor_id='".$trow['instructor_id']."'");
            $b=mysqli_fetch_array($a);
          ?>
         <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this user??</p><center>
          <h6><center>Cashier name: <strong><?php echo ucwords($b['fullname']); ?></strong></center></h6>
          <form role="form" method="POST" action="delete-instructor.php<?php echo '?id='.$b['instructor_id']; ?>">
        </div>                 
          </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

 
 <!-- Delete admin -->
    <div class="modal fade modal-fullscreen" id="del_admin<?php echo $adrow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Deleting User</h5></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">

          <?php
            $a1=mysqli_query($conn,"select * from admin where userid='".$adrow['userid']."'");
            $b1=mysqli_fetch_array($a1);
          ?>
          
         <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this user??</p><center>
          <h6><center>Admin name: <strong><?php echo ucwords($b1['fullname']); ?></strong></center></h6>
          <form role="form" method="POST" action="delete-admin.php<?php echo '?id='.$b1['userid']; ?>">
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

 
 <!-- Delete Pending Student -->
    <div class="modal fade modal-fullscreen" id="del_pend<?php echo $pendRow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Deleting Pending Student</h5></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
          <?php
            $pendSql=mysqli_query($conn,"select * from student where userid='".$pendRow['userid']."'");
            $penRow=mysqli_fetch_array($pendSql);
          ?>
         <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this user??</p><center>
          <h6><center>Student name: <strong><?php echo ucwords($penRow['fullname']); ?></strong></center></h6>
          <form role="form" method="POST" action="delete-pend_stud.php<?php echo '?id='.$penRow['userid']; ?>">
        </div>                 
          </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

 <!-- Aksep Pending Student -->
    <div class="modal fade modal-fullscreen" id="aksep_<?php echo $pendRow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Accept Pending Student</h5></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
          <?php
            $pendSql=mysqli_query($conn,"select * from student where userid='".$pendRow['userid']."'");
            $penRow=mysqli_fetch_array($pendSql);
          ?>
         <center> <p style="font-size: 15px; color: black;">Do you want to accept this Student??</p><center>
          <h6><center>Student name: <strong><?php echo ucwords($penRow['fullname']); ?></strong></center></h6>
          <form role="form" method="POST" action="accept_pending.php<?php echo '?id='.$penRow['userid']; ?>">
        </div>                 
          </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="aksep_btn"><i class="fa fa-check"></i> Accept</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->