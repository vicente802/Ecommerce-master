<style type="text/css">   
.thisline{
    width: 240px;
    height: 10px;
    border-bottom: 1px solid black;
    }
.inputLine {
    border: 0;
    border-bottom: 1px solid #000;
    width: 100%;
    text-align: center;
}    
</style>

<!-- Edit Admin Profile Modal -->
<div class="modal fade modal-fullscreen" id="edit0_<?php echo $trow['instructor_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargespan"> Edit Instructor</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid" style=" text-align: left;">

          <?php
              $sq=mysqli_query($conn,"select * from instructor where instructor_id='".$trow['instructor_id']."'");
              $trow1=mysqli_fetch_array($sq);
          ?>

                <form role="form" method="POST" action="edit_ins_db.php?id=<?php echo $trow['instructor_id']; ?>" enctype="multipart/form-data">

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Fullname</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-user-tie"></i></div>
                    </div>
                    <input type="text"  placeholder="Fullname" name="fullname" class="form-control" id="form_fname_1" required="" value="<?php echo ucwords($trow1['fullname']); ?>" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                  </div>
                </div>

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Contact number</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-phone"></i></div>
                    </div>
                    <input type="text" placeholder="Contact number" name="contact_number" pattern="[0-9]{11}" title="Contact number must only contain 11 digits" class="form-control" id="form_contact_number_1" required="" value="<?php echo ($trow1['contact_number']); ?>">
                  </div>
                </div>

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Address</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-address-card"></i></div>
                    </div>
                    <input class="form-control" id="address_1" required="" type="text" name="address" placeholder="Address" value="<?php echo ($trow1['address']); ?>">
                  </div>
                </div>
                      
                            <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm" id="edit" name="edit"><i class="fa fa-save"></i> | Save Changes</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
                    </div>     
                </div>                    
                  </form>
            </div> 
        </div>
      </div>
    </div>
  </div>  

