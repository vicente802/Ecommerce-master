  <div class="modal fade modal-fullscreen" id="add_instrucmodal" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding Instructor</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			   <div class="container-fluid">
				      <form method="post" action="instructor_db.php" id="register_form">
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Fullname</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-user-tie"></i></div>
                    </div>
                    <input type="text"  placeholder="Fullname" name="fullname" class="form-control" id="form_fname_1" required="" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                  </div>
                </div>

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Contact number</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-phone"></i></div>
                    </div>
                    <input type="text" placeholder="Contact number" name="contact_number" pattern="[0-9]{11}" title="Contact number must only contain 11 digits" class="form-control" id="form_contact_number_1" required="">
                  </div>
                </div>

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Address</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-address-card"></i></div>
                    </div>
                    <input class="form-control" id="address_1" required="" type="text" name="address" placeholder="Address">
                  </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="addsub" id="addsub btnTestSaveTextButtons" class="btn btn-success btn-sm"><i class="fa fa-save"></i> | Save</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
                </div>
        
        </form>
        </div> 
        </div>
        

      </div>
    </div>
  </div>  

