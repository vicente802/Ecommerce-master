<?php include('check_val.php'); ?>

 <head>
    <style type="text/css">
        .error_form0
            {
                top: 12px;
                color: rgb(216, 15, 15);
                font-size: 13px;
                font-family: Helvetica;
            }
        #pic 
            {
                height: 30px; width: 30px;
            }    
    </style>
</head>

<!-- Add student Modal -->
<div class="modal fade modal-fullscreen" id="add_admin_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargespan"> New admin</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">

                <form role="form" method="POST" action="check_val.php" enctype="multipart/form-data" id="register_form">
                
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Username</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-user-tie"></i></div>
                    </div>
                    <input class="form-control" id="form_uname0" required="" type="text" name="username" placeholder="Username" >
                  </div>
                </div>

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Fullname</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-address-card"></i></div>
                    </div>
                    <input type="text"  placeholder="Fullname" name="fullname" class="form-control" id="form_fname0" required="" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                  </div>
                </div>

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Contact number</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fas fa-phone"></i></div>
                    </div>
                    <input type="text" placeholder="Contact number" name="contact_number" pattern="[0-9]{11}" title="Contact number must only contain 11 digits" class="form-control" id="form_contact_number0" required="" >
                  </div>
                </div>

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Password</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fab fa-slack-hash"></i></div>
                    </div>
                    <input type="password"  placeholder="Password" name="password" pattern=".{8,}" title="Password must be 8 characters long." class="form-control" id="form_password0" required="" >
                  </div>
                </div>    

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Confirm Password</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="fab fa-slack-hash"></i></div>
                    </div>
                    <input type="password" placeholder="Confirm Password" name="cpassword" class="form-control" id="form_cpassword0" required="">
                  </div>
                </div>  

                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Upload Image</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text" style="width: 50px"><i class="far fa-image"></i></div>
                    </div>
                     <input type="file" name="image" class="form-control" >  
                  </div>
                </div>   
                    
                            <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm" id="register" name="register"><i class="fa fa-save"></i> | Save</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> | Cancel</button>
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

         $("#uname_error_message0").hide();
         $("#fname_error_message0").hide();
         $("#contact_number_error_message0").hide();
         $("#password_error_message0").hide();
         $("#cpassword_error_message0").hide();

         var error_uname = false;
         var error_fname = false;
         var error_contact_number = false;
         var error_password = false;
         var error_cpassword = false;

         $("#form_uname0").focusout(function() {
            check_uname();
         });
         $("#form_fname0").focusout(function() {
            check_fname();
         });
         $("#form_contact_number0").focusout(function() {
            check_contact_number();
         });
         $("#form_password0").focusout(function() {
            check_password();
         });
         $("#form_cpassword0").focusout(function() {
            check_cpassword();
         });

         function check_uname() {
            var uname = $("#form_uname0").val();
            if (!uname.length == 0) {
               $("#uname_error_message0").hide();
               $("#form_uname0").css("border-bottom","2px solid #77b300");
            } else {
               //$("#uname_error_message0").html("Should contain only Characters");
               $("#uname_error_message0").show();
               $("#form_uname0").css("border-bottom","2px solid #e60000");
               error_uname = true;
            }
         }

         function check_fname() {
            var fname = $("#form_fname0").val()
            if (!fname.length == 0) {
               $("#fname_error_message0").hide();
               $("#form_fname0").css("border-bottom","2px solid #77b300");
            } else {
               //$("#fname_error_message0").html("Should contain only Characters");
               $("#fname_error_message0").show();
               $("#form_fname0").css("border-bottom","2px solid #e60000");
               error_fname = true;
            }
         }

         function check_password() {
            var password_length = $("#form_password0").val().length;
            if (password_length < 8) {
               //$("#password_error_message0").html("Atleast 5 Characters");
               $("#password_error_message0").show();
               $("#form_password0").css("border-bottom","2px solid #e60000");
               error_password = true;
            } else {
               $("#password_error_message0").hide();
               $("#form_password0").css("border-bottom","2px solid #77b300");
            }
         }

         function check_cpassword() {
            var password = $("#form_password0").val();
            var cpassword = $("#form_cpassword0").val();
            if (password !== cpassword) {
               $("#cpassword_error_message0").html("Passwords Did not Matched");
               $("#cpassword_error_message0").show();
               $("#form_cpassword0").css("border-bottom","2px solid #e60000");
               error_cpassword = true;
            } else {
               $("#cpassword_error_message0").hide();
               $("#form_cpassword0").css("border-bottom","2px solid #77b300");
            }
         }

         function check_contact_number() {
            var pattern = /^[0-9]{11}$/;
            var contact_number = $("#form_contact_number0").val();
            if (pattern.test(contact_number) && contact_number !== '') {
               $("#contact_number_error_message0").hide();
               $("#form_contact_number0").css("border-bottom","2px solid #77b300");
            } 
            else if (contact_number.length != 11) {
               //$("#contact_number_error_message0").html("Should Atleast 11 digits");
               $("#contact_number_error_message0").show();
               $("#form_contact_number0").css("border-bottom","2px solid #e60000");
               error_contact_number = true;             
            }
            else if(contact_number.match(/^[A-Za-z]*$/)){
               //$("#contact_number_error_message0").html("Contact number must contain numbers only!");
               $("#contact_number_error_message0").show();
               $("#form_contact_number0").css("border-bottom","2px solid #e60000");
               error_contact_number = true;             
            }
            else {
               //$("#contact_number_error_message0").html("Invalid Contact number");
               $("#contact_number_error_message0").show();
               $("#form_contact_number0").css("border-bottom","2px solid #e60000");
               error_contact_number = true;
            }
         }

         $("#register_form").submit(function() {
            error_uname = false;
            error_fname = false;
            error_contact_number = false;
            error_password = false;
            error_cpassword = false;

            check_uname();
            check_fname();
            check_contact_number();
            check_password();
            check_cpassword();

            if (error_uname === false && error_fname === false && error_contact_number === false && error_password === false && error_cpassword === false) {
               return true;
            } else {
               alert("All forms must be valid before submitting");
               return false;
            }

         });
      });
</script>