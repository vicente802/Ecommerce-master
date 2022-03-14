 <!-- Delete Student -->
    <div class="modal fade modal-fullscreen" id="del_stud<?php echo $studRow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Deleting Student</h5></center>
                </div>
                  <div class="modal-body">
                    <div class="container-fluid">

                      <?php
                        $studSqL=mysqli_query($conn,"select * from user left join student on user.userid=student.userid where user.userid='".$studRow['userid']."'");
                        $sRow=mysqli_fetch_array($studSqL);
                      ?>

                     <center> <p style="font-size: 18px; color: black;">Are you sure you want to delete this student??</p><center>
                      <h6><center>Student name: <strong><?php echo ucwords($sRow['username']); ?></strong></center></h6>

                      <form role="form" method="POST" action="delete-stud-user.php<?php echo '?id='.$sRow['userid']; ?>">
                    </div>                 
                  </div>

                  <div class="modal-footer">
                    <p style="color:red; font-size: 13px; text-align: left;"><strong>WARNING!</strong> Once deleted, it will delete all student's data including, subjects, payments etc..</p>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                      </form>
                  </div>
            </div>
        </div>
    </div>
<!-- /.modal -->


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

<!-- Edit student Profile Modal -->
<div class="modal fade modal-fullscreen" id="edit0_<?php echo $studRow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargespan"> Edit student</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid" style=" text-align: left;">

          <?php
              $sq=mysqli_query($conn,"select * from student left join user on user.userid=student.userid where user.userid='".$studRow['userid']."'");
              $eSrow=mysqli_fetch_array($sq);
          ?>

                <form role="form" method="POST" action="edit_student_info.php?id=<?php echo $studRow['userid']; ?>" enctype="multipart/form-data">

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Username</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-user-tie"></i></div>
                    </div>
                    <input class="form-control" id="form_uname" required="" type="text" name="username" placeholder="Username" value="<?php echo ($eSrow['username']); ?>">
                  </div>
                </div>

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Fullname</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-address-card"></i></div>
                    </div>
                    <input type="text"  placeholder="Fullname" name="fullname" class="form-control" id="form_fname" required="" value="<?php echo ucwords($eSrow['fullname']); ?>" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                  </div>
                </div>

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Contact number</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-phone"></i></div>
                    </div>
                    <input type="text" placeholder="Contact number" name="contact_number" pattern="[0-9]{11}" title="Contact number must only contain 11 digits" class="form-control" id="form_contact_number" required="" value="<?php echo ($eSrow['contact_number']); ?>">
                  </div>
                </div>

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Password</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fab fa-slack-hash"></i></div>
                    </div>
                    <input type="password"  placeholder="Password" pattern=".{8,}" title="Password must be 8 characters long." name="password" class="form-control" id="form_password" required="" value="<?php echo ($eSrow['password']); ?>">
                  </div>
                </div>   
                  
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Image</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="far fa-image"></i></div>
                    </div>
                     <input type="file" name="image" value="<?php echo ($eSrow['image']); ?>" class="form-control">  
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
               //$("#uname_error_message").html("Should contain only Characters");
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
               //$("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#form_fname").css("border-bottom","2px solid #e60000");
               error_fname = true;
            }
         }

         function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 8) {
               //$("#password_error_message").html("Atleast 5 Characters");
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
               //$("#contact_number_error_message").html("Should Atleast 11 digits");
               $("#contact_number_error_message").show();
               $("#form_contact_number").css("border-bottom","2px solid #e60000");
               error_contact_number = true;             
            }
            else if(contact_number.match(/^[A-Za-z]*$/)){
              // $("#contact_number_error_message").html("Contact number must contain numbers only!");
               $("#contact_number_error_message").show();
               $("#form_contact_number").css("border-bottom","2px solid #e60000");
               error_contact_number = true;             
            }
            else {
               //$("#contact_number_error_message").html("Invalid Contact number");
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

<!-- /.modal -->
