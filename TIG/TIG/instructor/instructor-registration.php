<?php 
session_start();
include('new-instructor.php'); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Graduate School - Tagudin Campus</title>

    <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/FF.png">
    <script src="jquery.js"></script>


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="assets/bootstrap-table.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style.css">
    <link href="dist/css/fs-modal.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<style type="text/css">
          .carousel-inner {
            width: 100%;
            height: 100%;
        }
</style>
<body>
<!-- Page Content Holder -->
<img class="wave" src="">
         <div class="container">
            <div class="signup-content">
                 <form method="post" action="instructor-registration.php" id="register_form">
                  <img src="../img/gs.png"style="width: 30%;">
                     <h2 class="title">SIGN UP</h2>
                     <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
                       <input class="form-control" id="form_uname" required="" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>"><center><span class="error_form" id="uname_error_message"></span></center>
                       <?php if (isset($name_error)): ?>
                       <center><span><?php echo $name_error; ?></span></center>
                       
                       <?php endif ?>
                     </div>
                      <div>
                        <input type="fullname"  placeholder="Fullname" name="fullname" class="form-control input" id="form_fname" required="">
                        <center><span class="error_form" id="fname_error_message"></span></center>
                     </div>
                     <div>
                        <input type="text" placeholder="Contact number" name="contact_number" pattern="[0-9]{11,}" title="Contact number must only contain 11 digits" class="form-control input" id="form_contact_number" required="">
                        <center><span class="error_form" id="contact_number_error_message"></span></center>
                     </div>   
                     <div>
                        <input type="text" placeholder="Address" name="address" class="form-control input" id="form_address" required="">
                        <center><span class="error_form" id="address_error_message"></span></center>
                     </div>         
                     <div>
                        <input type="password"  placeholder="Password" name="password" class="form-control input" pattern=".{8,}" title="Password must be 8 characters long." id="form_password" required="">
                        <center><span class="error_form" id="password_error_message"></span></center>
                     </div>
                     <div>
                        <input type="password"  placeholder="Confirm Password" name="cpassword" class="form-control input" id="form_cpassword" required="">
                           <center><span class="error_form" id="cpassword_error_message"></span></center>
                     </div>
                     <br>
                     <div>
                        <button type="submit" name="register" id="reg_btn">Submit</button>
                     </div>
                 </form>         
            </div>
         </div>
</body>
</html>
<script type="text/javascript">
      $(function() {

         $("#uname_error_message").hide();
         $("#fname_error_message").hide();
         $("#contact_number_error_message").hide();
         $("#address_error_message").hide();
         $("#password_error_message").hide();
         $("#cpassword_error_message").hide();

         var error_uname = false;
         var error_fname = false;
         var error_contact_number = false;
         var error_address = false;
         var error_password = false;
         var error_cpassword = false;

         $("#form_uname").focusout(function() {
            check_uname();
         });
         $("#form_fname").focusout(function() {
            check_fname();
         });
         $("#form_contact_number").focusout(function() {
            check_contact_number();
         });
         $("#form_address").focusout(function() {
            check_address();
         });
         $("#form_password").focusout(function() {
            check_password();
         });
         $("#cpassword_error_message").focusout(function() {
            check_cpassword();
         });

         function check_uname() {
            var uname = $("#form_uname").val();
            if (!uname.length == 0) {
               $("#uname_error_message").hide();
               $("#form_uname").css("border-bottom","2px solid #34F458  ");
            } else {
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
               $("#fname_error_message").show();
               $("#form_fname").css("border-bottom","2px solid #F90A0A");
               error_fname = true;
            }
         }

         function check_address() {
            var adress = $("#form_address").val()
            if (!adress.length == 0) {
               $("#address_error_message").hide();
               $("#form_address").css("border-bottom","2px solid #34F458");
            } else {
               $("#fname_error_message").show();
               $("#form_address").css("border-bottom","2px solid #F90A0A");
               error_address = true;
            }
         }

         function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 6) {
               $("#password_error_message").show();
               $("#form_password").css("border-bottom","2px solid #F90A0A");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#form_password").css("border-bottom","2px solid #34F458");
            }
         }

         function check_cpassword() {
            var password = $("#form_password").val();
            var cpassword = $("#form_cpassword").val();
            if (password !== cpassword) {
               $("#cpassword_error_message").html("Passwords did not matched");
               $("#cpassword_error_message").show();
               $("#form_cpassword").css("border-bottom","2px solid #F90A0A");
               error_cpassword = true;
            } else {
               $("#cpassword_error_message").hide();
               $("#form_cpassword").css("border-bottom","2px solid #34F458");
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
               $("#contact_number_error_message").show();
               $("#form_contact_number").css("border-bottom","2px solid #F90A0A");
               error_contact_number = true;             
            }
            else if(contact_number.match(/^[A-Za-z]*$/)){
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

         $("#register_form").submit(function() {
            error_uname = false;
            error_fname = false;
            error_contact_number = false;
            error_password = false;
            error_cpassword = false;
            error_address = false;

            check_uname();
            check_fname();
            check_contact_number();
            check_password();
            check_cpassword();
            check_address();

            if (error_uname === false && error_fname === false && error_address === false && error_contact_number === false && error_password === false && error_cpassword === false) {
               return true;
            } else {
               alert("All forms must be valid before submitting");
               return false;
            }


         });
      });
   </script>
