  <div class="modal fade modal-fullscreen" id="edit<?php echo $crow['userid']; ?>" tabindex="-1" role="dialog" aria-spanledby="modalLargespan">
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
                  $asq=mysqli_query($conn,"SELECT * from student left join user on user.userid=student.userid where user.userid='".$_SESSION['userid']."'");
                  $srow=mysqli_fetch_array($asq);

              ?>

              <form method="POST" action="edit.php?id=<?php echo $srow['userid']; ?>" id="edit_form" enctype="multipart/form-data">


                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input type="text" class="form-control" id="form_uname" required="" type="text" name="username" placeholder="Username" value="<?php echo ($srow['username']); ?>" style="background-color: transparent;">
                          </div>
                        </div>

                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Fullname</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-address-card"></i></div>
                            </div>
                            <input type="text" class="form-control"placeholder="Fullname" name="fullname" class="form-control" id="form_fname" required="" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}"  value="<?php echo ucwords($srow['fullname']); ?>" style="background-color: transparent;">
                          </div>
                        </div>

                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Contact number</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-phone"></i></div>
                            </div>
                            <input type="text" pattern="[0-9]{11}" title="Contact number must be 11 digits" placeholder="Contact number" name="contact_number" class="form-control" id="form_contact_number" required="" value="<?php echo ($srow['contact_number']); ?>" style="background-color: transparent;">
                          </div>
                        </div>
                 

                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Password</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fab fa-slack-hash"></i></div>
                            </div>
                            <input type="password" placeholder="Password" name="password" class="form-control" id="form_password" required="" value="<?php echo ($srow['password']); ?>"style="background-color: transparent;">
                          </div>
                        </div>


                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Photo</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-image"></i></div>
                            </div>
                            <input type="file" class="form-control" name="image" value="<?php echo ($srow['image']); ?>" style="background-color: transparent;">
                          </div>
                        </div>              
                      
                   
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="edit" id="edit_btn" class="btn btn-success btn-sm"><i class="fas fa-save" ></i> | Save changes</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
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
            if (password_length < 8) {
               $("#password_error_message").html("Atleast 8 Characters");
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
               $("#contact_number_error_message").html("Contact number Should Atleast 11 digits");
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

<!-------------------------------------------------------------------------------------------------------------------------
  Edit Student Profile Modal 
<div class="modal fade" id="edit <?php // echo $crow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" >
      <div class="modal-content">

        Modal Header 
        <div class="modal-header" style="background-color: #990000">
          <h4 class="modal-title" id="formTitle" style="color: white"><i class="fas fa-user-edit"></i> Edit Account</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        Modal body 
        <div class="modal-body">
            <?php
                //$asq=mysqli_query($conn,"select * from student left join user on user.userid=student.userid where user.userid='".$_SESSION['id']."'");
                //$srow=mysqli_fetch_array($asq);
            ?><br>
        <div class="bgimg3" >
            <div id="font" class="hid">
                <i class="fas fa-check"></i>
            </div>
            <div id="wrong" class="hid">
                <i class="fas fa-times"></i>
            </div>
            <div class="centerdiv3">
                <form method="POST" action="edit.php?id=<?php //echo $srow['userid']; ?>" enctype="multipart/form-data">
                    <div class="form-group input-group regBox3">
                        <input type="text" style="background-color: #f5f5f0;" class="form-control inputbox3" id="username1"  name="username" value="<?php //echo ($srow['username']); ?>" onkeyup="validateUname()" required="">
                        <label id="commentUnamePromt">Username:</label>
                    </div>
                        <br>
                    <div class="form-group input-group regBox3">
                        <input type="text" style="background-color: #f5f5f0;" class="form-control" name="fullname1" id="fullname1" value="<?php //echo ucwords($srow['fullname']); ?>" onkeyup="validateFullname()" required="">
                        <label id="commentFullnamePromt" class="input-group-addon">Fullname:</label>
                    </div>
                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" name="image1" id="image" value="<?php //echo ucwords($srow['image']); ?>" >
                        <br>
                    <div class="form-group input-group regBox3">
                        <input type="text" style="background-color: #f5f5f0;" class="form-control" id="contact_number1" name="contact_number1" value="<?php //echo ucwords($srow['contact_number']); ?>" onkeyup="validatenum()" required="">
                        <label id="commentnumPromt" class="input-group-addon">Contact Number:</label>
                    </div>
                        <br>
                    <div class="form-group input-group regBox3">
                        <input type="password" style="background-color: #f5f5f0;" class="form-control" id="password1" name="password1" value="<?php // echo ($srow['password']); ?>" onkeyup="validatepword()" required="">
                        <label id="commentpwordPromt" class="input-group-addon">Password:</label>
                    </div>                    
                    <div class="form-group input-group regBox3">
                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" name="id" id="id" value="<?php //echo ($srow['id']); ?>">
                    </div>                                                        
                  </form> 
                 <div style="text-align:left;">
                        <label id="commentPromt" style="text-align: center;"></label>
                        <button type="submit" class="btn btn-success btn" id="btnsub" name="btnsub" onclick="validateCommentForm()"><i class="fa fa-save"></i> Save Changes</button>
                </div> 
           
            </div>
        </div>
        </div>

        Modal footer 
        <div class="modal-footer" style="background-color: #990000">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 30%;"> <i class="fas fa-window-close"></i> Cancel</button>
        </div>
        
      </div>
    </div>
</div>


Edit Student profile image Modal 

<div class="modal fade modal2" id="edit1<?php //echo $crow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" >
      <div class="modal-content">

        Modal Header 
        <div class="modal-header" style="background-color: #990000">
          <h4 class="modal-title" id="formTitle" style="color: white"><i class="fas fa-user-edit"></i> Edit Account</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        Modal body 
        <div class="modal-body">
                <?php
                    //$edit=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'"); 
                    //$srow=mysqli_fetch_array($edit);
                    
                   // $edit1=mysqli_query($conn,"select * from student where userid='".$_SESSION['id']."'");              
                    //$srow=mysqli_fetch_array($edit1);
                ?><br>
        <div class="bgimg3" >
            <div id="font" class="hid">
                <i class="fas fa-check"></i>
            </div>
            <div id="wrong" class="hid">
                <i class="fas fa-times"></i>
            </div>
            <div class="centerdiv3">
                <form method="POST" action="edit.php?id=<?php //echo $srow['userid']; ?>" enctype="multipart/form-data">
                    <div class="form-group input-group regBox3">
                        <input type="file" style="background-color: #f5f5f0;" class="form-control inputbox3" id="image"  name="image" value="<?php // echo ($srow['image']); ?>">
                    </div>
                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control inputbox3" id="username1"  name="username" value="<?php //echo ($srow['username']); ?>" >

                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" name="fullname" id="fullname1" value="<?php //echo ucwords($srow['fullname']); ?>" >

                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" id="contact_number1" name="contact_number" value="<?php // echo ucwords($srow['contact_number']); ?>" >

                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" id="password1" name="password" value="<?php //echo ($srow['password']); ?>">                
                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" name="id" id="id" value="<?php //echo ($srow['id']); ?>">                                                      
                 <div style="text-align:left;">
                        <label id="commentPromt" style="text-align: center;"></label>
                        <button type="submit" class="btn btn-success btn" id="btnsub" name="btnsub" ><i class="fa fa-save"></i> Save Changes</button>
                </div> 
            </form> 
            </div>
        </div>
        </div>

        Modal footer 
        <div class="modal-footer" style="background-color: #990000">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 30%;"> <i class="fas fa-window-close"></i> Cancel</button>
        </div>
        
      </div>
    </div>
</div>


    
    