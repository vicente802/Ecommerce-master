<?php
include 'connect.php';
	session_start();
	
	if (isset($_SESSION['userid'])){
		$query=mysqli_query($conn,"SELECT * from user where userid='".$_SESSION['userid']."'");
		$row=mysqli_fetch_array($query);

		if ($row['position']=='Admin'){
			header('location:admin/admin_page.php');
		}
		else{
			header('location:student/admission.php');
		}
	}

include('add_student.php'); 

?>	
<!DOCTYPE HTML>
<html>

<?php include 'header.php' ?>
	
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(img/TIS2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small"><em> Welcome to  Taguig Integrated School</em> </span>
							<h2>T- Teach and train pupils to become responsible and respectful citizens. <br>
								I - Inspire every pupil to acquire knowledge and develop essential skills. <br>
								S - Support pupils in achieving their goals that will lead to the betterment of their family and society.<br>
							</h2>		
						</div>
					</div>
							
					
				</div>
			</div>
		</div>
	</header>
<!--	

	-->
	<div id="gtco-features" class="border-bottom">
		<div class="gtco-container">
			<div class="row">
				<div class="text-center gtco-heading animate-box">
					<img src="img/omv.png" style="height: 350px; margin-bottom: -160px">
				</div>
				<div class="col-md-8 col-md-offset-2 text-left gtco-heading animate-box">
					<h2>VISSION</h2>
					<p>A vibrant and nurturing Polytechnic Service College for transforming lives and communities.</p>
				</div>
				<div class="col-md-8 col-md-offset-2 text-right gtco-heading animate-box">
					<h2>MISSION</h2>
					<p>To deliver fundamental services geared toward harnessing pupils’ innate talents, life-long skills, knowledge and desirable values upheld in a supportive environment.</p>
				</div>
			</div>
		</div>	
	</div>	
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<div class="modal" id="loginModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<h3>Login Form</h3>
				</div>
				<div class="modal-body">
					<form action="login.php" method="post" id="login-form">
						<label>
							Email
						</label>
						<input type="text" name="login-email" id="login-email" class='form-control' placeholder="juandelacruz@example.com" required>
						<label for>Password</label>
						<input type="password" name="login-password" id="login-password" class='form-control' placeholder="***********" required>
						<br>
						<button type="submit" class="btn btn-primary" name="loginSend">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id="signModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<h3>Sign Up Form</h3>
				</div>
				<div class="modal-body">
					<form  id='sign-form'>
						<div class="row">
							<div class="col-md-6">
								<label>First Name</label>
								<input type="text" name="fname" id="fname" class='form-control' placeholder="Juan" required>
							</div>
							<div class="col-md-6">
								<label>Last Name</label>
								<input type="text" name="lname" id="lname" class='form-control' placeholder="Dela Cruz" required>
							</div>
						</div>
						<label for>Email</label>
						<input type="email" name="email" id="email" class='form-control' placeholder="juandelacruz@example.com" required>
						<label for>Password</label>
						<input type="password" name="password" id="password" class='form-control' placeholder="***********" required>
						<div class="pass-msg"></div>
						<label for>Password</label>
						<input type="password" name="password2" id="password2" class='form-control' placeholder="***********" required>
						<div class="pass2-msg"></div>
						<br>
						<div class="g-recaptcha" data-sitekey="6LdGsMkeAAAAAAigoDAgoJLuHABH65PK1uossJyi"></div>
						<div class="recapt-msg"></div>
						<br>
						<button type="submit" class="btn btn-primary sign_btn" name="signSend">Sign up</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id="emailModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<h3>Email Verification</h3>
				</div>
				<div class="modal-body">
					<form  id='email-form'>
						<h3>Please check Email to get your verification code</h3>
						<input type="number" name="code" id="code" class="form-control+" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
						<input type="hidden" name="email-con" id="email-con" value="">
						<button type="submit" class="btn btn-primary confirm_btn" name="signSend">Confirm</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.sign_btn').prop('disabled', true);
		$('#login-form').on('submit', function(e){
	
			var email = $('#login-email').val();
			var pass = $('#login-password').val();
			$.ajax({
				type: "POST",
				url: "login.php",
				data:{
					emailSend: email,
					passSend: pass
				},
				success: function(data){
					console.log(data);
				}
			});
		});
		$('#password').keyup(function(e){
			var pass = $(this).val();
			if(pass.length < 8){
				$('.sign_btn').prop('disabled', true);
				$('.pass-msg').text('password must be at least 8 characters').fadeIn().css('color', 'red');
			}
			else{
				$('.pass-msg').fadeOut();
			}
		});
		$('#password2').keyup(function(e){
			var pass = $(this).val();
			var pass1 = $('#password').val();
			if(pass !== pass1){
				$('.sign_btn').prop('disabled', true);
				$('.pass2-msg').text('password did not match').fadeIn().css('color', 'red');
			}
			else{
				$('.pass2-msg').fadeOut();
				$('.sign_btn').prop('disabled', false);
			}
		});
		$('#sign-form').on('submit', function(e) {
			e.preventDefault();
			var fname = $('#fname').val();
			var lname = $('#lname').val();
			var email = $('#email').val();
			var pass = $('#password').val();
			
			if(grecaptcha.getResponse().length !== 0){
			$.ajax({
				type: "POST",
				url: "signup.php",
				data:{
					emailSend: email,
					passSend: pass,
					fnameSend: fname,
					lnameSend: lname,
				},
				beforeSend: function(){
					$('.sign_btn').text('Please Wait...');
				},	
				success: function(data) {
					
					$('#signModal').modal('hide');
					$('#emailModal').modal('show');
					$('#email-con').val(email);
					$('#fname').val('');
					$('#lname').val('');
					$('#email').val('');
					$('#password').val('');
				}
			});
			}else{
				$('.recapt-msg').text('Check the reCAPTCHA').fadeIn().css('color', 'red');
				$('.recapt-msg').text('Check the reCAPTCHA').fadeOut(3000).css('color', 'red');
			}
			
			
		})
	});
      $(function() {

         $("#uname_error_message").hide();
         $("#fname_error_message").hide();
         $("#contact_number_error_message").hide();
         $("#password_error_message").hide();
         $("#cpassword_error_message").hide();

         var error_uname = false;
         var error_fname = false;
         var error_contact_number = false;
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
               $("#form_uname").css("border-bottom","2px solid #77b300  ");
            } else {
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
               $("#fname_error_message").show();
               $("#form_fname").css("border-bottom","2px solid #e60000");
               error_fname = true;
            }
         }

         function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 6) {
               $("#password_error_message").show();
               $("#form_password").css("border-bottom","2px solid #e60000");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#form_password").css("border-bottom","2px solid #77b300");
            }
         }

         function check_cpassword() {
            var password = $("#form_password").val();
            var cpassword = $("#form_cpassword").val();
            if (password !== cpassword) {
               $("#cpassword_error_message").html("Passwords did not matched");
               $("#cpassword_error_message").show();
               $("#form_cpassword").css("border-bottom","2px solid #e60000");
               error_cpassword = true;
            } else {
               $("#cpassword_error_message").hide();
               $("#form_cpassword").css("border-bottom","2px solid #77b300");
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
               $("#contact_number_error_message").show();
               $("#form_contact_number").css("border-bottom","2px solid #e60000");
               error_contact_number = true;             
            }
            else if(contact_number.match(/^[A-Za-z]*$/)){
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
               alert("Thank you for signing up!");
            } else {
               alert("All forms must be valid before submitting");
               return false;
            }


         });
      });
   </script>

	</body>
</html>

