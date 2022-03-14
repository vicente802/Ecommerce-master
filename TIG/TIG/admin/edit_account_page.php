  <div class="modal fade modal-fullscreen" id="edit_prof_<?php echo $acrow['userid']; ?>" tabindex="-1" role="dialog" aria-spanledby="modalLargespan">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargespan"> Edit my account</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">

            <?php
                  $sq=mysqli_query($conn,"select * from admin left join user on user.userid=admin.userid where user.userid='".$_SESSION['id']."'");
                  $arow1=mysqli_fetch_array($sq);

              ?>

              <form method="POST" action="edit_prof.php?id=<?php echo $arow1['userid']; ?>" id="edit_form" enctype="multipart/form-data">

                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input type="text" class="form-control" id="form_uname" required="" type="text" name="username" placeholder="Username" value="<?php echo ($arow1['username']); ?>" style="background-color: transparent;">
                          </div>
                        </div>

                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Fullname</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-address-card"></i></div>
                            </div>
                            <input type="text" class="form-control"placeholder="Fullname" name="fullname" class="form-control" id="form_fname" required="" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}"  value="<?php echo ucwords($arow1['fullname']); ?>" style="background-color: transparent;">
                          </div>
                        </div>

                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Contact number</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-phone"></i></div>
                            </div>
                            <input type="text" pattern="[0-9]{11}" title="Contact number must be 11 digits" placeholder="Contact number" name="contact_number" class="form-control" id="form_contact_number" required="" value="<?php echo ($arow1['contact_number']); ?>" style="background-color: transparent;">
                          </div>
                        </div>
                 

                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Password</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fab fa-slack-hash"></i></div>
                            </div>
                            <input type="password" placeholder="Password" name="password" class="form-control" id="form_password" required="" value="<?php echo ($arow1['password']); ?>"style="background-color: transparent;">
                          </div>
                        </div>


                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Photo</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-image"></i></div>
                            </div>
                            <input type="file" class="form-control" name="image" value="<?php echo ($arow1['image']); ?>" style="background-color: transparent;">
                          </div>
                        </div>              

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="edit" id="edit_btn" class="btn btn-success btn-sm"><i class="far fa-save"></i> | Save changes</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> <i class="far fa-window-close"></i> | Cancel</button>
                </div>
        
        </form>
        </div> 
        </div>
      </div>
    </div>
  </div>  


<script type="text/javascript">
      $(function() {

         $("#uname_error_message").hide();
         $("#fname_error_message").hide();
         $("#contact_number_error_message").hide();
         $("#password_error_message").hide();

         var error_uname = false;
         var error_fname = false;
         var error_contact_number = false;
         var error_password = false;

         $("#form_uname").focusout(function() {
            check_uname();
         });
         $("#form_fname").focusout(function() {
            check_fname();
         });
         $("#form_contact_number").focusout(function() {
            check_contact_number();
         });
         $("#form_password").focusout(function() {
            check_password();
         });

         function check_uname() {
            var uname = $("#form_uname").val();
            if (!uname.length == 0) {
               $("#uname_error_message").hide();
               $("#form_uname").css("border-bottom","2px solid #77b300");
            } else {
               $("#uname_error_message").html("Should contain only Characters");
               $("#uname_error_message").show();
               $("#form_uname").css("border-bottom","2px solid #e60000");
               error_uname = true;
            }
         }

         function check_fname() {
            var fname = $("#form_fname").val()
            if (!fname.length == 0) {
               $("#fname_error_message").hide();
               $("#form_fname").css("border-bottom","2px solid #77b300");
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#form_fname").css("border-bottom","2px solid #e60000");
               error_fname = true;
            }
         }

         function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 8) {
               $("#password_error_message").html("Atleast 8 Characters");
               $("#password_error_message").show();
               $("#form_password").css("border-bottom","2px solid #e60000");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#form_password").css("border-bottom","2px solid #77b300");
            }
         }

         function check_contact_number() {
            var pattern = /^[0-9]{11}$/;
            var contact_number = $("#form_contact_number").val();
            if (pattern.test(contact_number) && contact_number !== '') {
               $("#contact_number_error_message").hide();
               $("#form_contact_number").css("border-bottom","2px solid #77b300");
            } 
            else if (contact_number.length != 11) {
               $("#contact_number_error_message").html("Contact number Should Atleast 11 digits");
               $("#contact_number_error_message").show();
               $("#form_contact_number").css("border-bottom","2px solid #e60000");
               error_contact_number = true;             
            }
            else if(contact_number.match(/^[A-Za-z]*$/)){
               $("#contact_number_error_message").html("Contact number must contain numbers only!");
               $("#contact_number_error_message").show();
               $("#form_contact_number").css("border-bottom","2px solid #e60000");
               error_contact_number = true;             
            }
            else {
               $("#contact_number_error_message").html("Invalid Contact number");
               $("#contact_number_error_message").show();
               $("#form_contact_number").css("border-bottom","2px solid #e60000");
               error_contact_number = true;
            }
         }

         $("#edit_form").submit(function() {
            error_uname = false;
            error_fname = false;
            error_contact_number = false;
            error_password = false;

            check_uname();
            check_fname();
            check_contact_number();
            check_password();

            if (error_uname === false && error_fname === false && error_contact_number === false && error_password === false) {
               return true;
            } else {
               alert("All forms must be valid before submitting");
               return false;
            }

         });
      });
</script>