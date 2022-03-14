    <div class="modal fade" id="edit_sy<?php echo $syrow['school_yr_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Change School Year</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"select * from school_year where school_yr_id='".$syrow['school_yr_id']."'");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <div style="height:10px;"></div>
                    <p style="color: black; text-align: center; font-size: 20px">Change School year to <?php echo $b['sy'] ?>?</p>
                    <form role="form" method="POST" action="sy_db.php<?php echo '?school_yr_id='.$syrow['school_yr_id']; ?>" >
                        <div class="form-group input-group">

                        <input name="status" type="hidden" id="status" value="<?php echo $b['status'] ?>">

                        </div>                      
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Yes</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
        </div>
    </div>
</div></div></div>


        <div class="modal fade" id="edit_sem<?php echo $semRow['sem_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Change Semester</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a1=mysqli_query($conn,"select * from semester where sem_id='".$semRow['sem_id']."'");
                        $b1=mysqli_fetch_array($a1);
                    ?>
                    <div style="height:10px;"></div>
                    <div style="height:10px;"></div>
                    <p style="color: black; text-align: center; font-size: 20px">Change Semester to <?php echo $b1['semester'] ?>?</p>
                    <form role="form" method="POST" action="update_semester.php<?php echo '?sem_id='.$semRow['sem_id']; ?>">
                        <div class="form-group input-group">

                        <input name="sem_status" type="hidden" id="status" value="<?php echo $b1['status'] ?>">
                        </div>                    
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Yes</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
        </div>
    </div>