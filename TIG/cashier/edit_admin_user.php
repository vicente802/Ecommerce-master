<!-- Edit Admin Profile Modal -->
<div class="modal fade modal-fullscreen" id="edit0_<?php echo $trow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargespan"> Edit admin...</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">

          <?php
              $sq=mysqli_query($conn,"select * from admin left join user on user.userid=admin.userid where user.userid='".$trow['userid']."'");
              $trow1=mysqli_fetch_array($sq);
          ?>

                <form role="form" method="POST" action="edit_prof.php?id=<?php echo $trow['userid']; ?>" enctype="multipart/form-data">

                 <div class="row" style="margin-bottom: 4%;">
                     <div class="col-sm-6">
                      <span style="color: #4080bf;">Username</span> 
                      <input class="form-control" id="form_uname" required="" type="text" name="username" placeholder="Username" value="<?php echo ($trow1['username']); ?>">
                      <center><span class="error_form" id="uname_error_message"></span></center>
                     </div>
                   </div>

                  <div class="row" style="margin-bottom: 4%;">
                     <div class="col-sm-12"> 
                      <span style="color: #4080bf; ">Fullname</span> 
                      <input type="text"  placeholder="Fullname" name="fullname" class="form-control" id="form_fname" required="" value="<?php echo ucwords($trow1['fullname']); ?>">
                      <center><span class="error_form" id="fname_error_message"></span></center>
                       </div>
                   </div>
                 
                  <div class="row" style="margin-bottom: 4%;">
                     <div class="col-sm">
                        <span style="color: #4080bf;">Contact number</span> 
                        <input type="text" placeholder="Contact number" name="contact_number" class="form-control" id="form_contact_number" required="" value="<?php echo ($trow1['contact_number']); ?>">
                        <center><span class="error_form" id="contact_number_error_message"></span></center>
                      </div>
                  
                     <div class="col-sm"> 
                        <span style="color: #4080bf;">Password</span> 
                        <input type="password"  placeholder="Password" name="password" class="form-control" id="form_password" required="" value="<?php echo ($trow1['password']); ?>">
                        <center><span class="error_form" id="password_error_message"></span></center>
                      </div>
                   </div>
                      
                   <div class="row" style="margin-bottom: 4%;">
                     <div class="col-sm-6">
                          <span style="color: #4080bf;">Select Profile Picture</span>  
                          <input type="file" name="image" value="<?php echo ($trow1['image']); ?>">  
                      </div>
                   </div>
                            <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn" id="edit" name="edit"><i class="fa fa-save"></i> Save Changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cancel</button>
                    </div>     
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
               $("#form_uname").css("border-bottom","2px solid #34F458");
            } else {
               $("#uname_error_message").html("Should contain only Characters");
               $("#uname_error_message").show();
               $("#form_uname").css("border-bottom","2px solid #F90A0A");
               error_uname = true;
            }
         }

         function check_fname() {
            var fname = $("#form_fname").val()
            if (!fname.length == 0) {
               $("#fname_error_message").hide();
               $("#form_fname").css("border-bottom","2px solid #34F458");
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#form_fname").css("border-bottom","2px solid #F90A0A");
               error_fname = true;
            }
         }

         function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 5) {
               $("#password_error_message").html("Atleast 5 Characters");
               $("#password_error_message").show();
               $("#form_password").css("border-bottom","2px solid #F90A0A");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#form_password").css("border-bottom","2px solid #34F458");
            }
         }

         function check_contact_number() {
            var pattern = /^[0-9]{11}$/;
            var contact_number = $("#form_contact_number").val();
            if (pattern.test(contact_number) && contact_number !== '') {
               $("#contact_number_error_message").hide();
               $("#form_contact_number").css("border-bottom","2px solid #34F458");
            } 
            else if (contact_number.length != 11) {
               $("#contact_number_error_message").html("Should Atleast 11 digits");
               $("#contact_number_error_message").show();
               $("#form_contact_number").css("border-bottom","2px solid #F90A0A");
               error_contact_number = true;             
            }
            else if(contact_number.match(/^[A-Za-z]*$/)){
               $("#contact_number_error_message").html("Contact number must contain numbers only!");
               $("#contact_number_error_message").show();
               $("#form_contact_number").css("border-bottom","2px solid #F90A0A");
               error_contact_number = true;             
            }
            else {
               $("#contact_number_error_message").html("Invalid Contact number");
               $("#contact_number_error_message").show();
               $("#form_contact_number").css("border-bottom","2px solid #F90A0A");
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