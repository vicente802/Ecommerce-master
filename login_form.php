<?php
#this is Login form page , if user is already logged in then we will not allow user to access this page by executing isset($_SESSION["uid"])
#if below statment return true then we will send user to their profile.php page

if (isset($_SESSION["uid"])) {
	header("location:profile.php");
}
//in action.php page if user click on "ready to checkout" button that time we will pass data in a form from action.php page
if (isset($_POST["login_user_with_product"])) {
	//this is product list array
	$product_list = $_POST["product_id"];
	//here we are converting array into json format because array cannot be store in cookie
	$json_e = json_encode($product_list);
	//here we are creating cookie and name of cookie is product_list
	setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);

}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Hardcore Motorshop</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		window.history.forward();
	</script>
	<style>
		.g-captcha{
			z-index: auto;
			text-align: center;
			float: center;

		}
	</style>
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="#" class="navbar-brand" style="margin-left: 5px;color:white;">Hardcore Motorshop</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
				<li><a href="index1.php"><span class="glyphicon glyphicon-modal-window">&nbsp;</span>Product</a></li>
				<li><a href="services.php"><span class="glyphicon glyphicon-globe">&nbsp;</span>Services</a></li>
				<li><a href="contactus.php"><span class="glyphicon glyphicon-earphone">&nbsp;</span>Contact Us</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Customer Login Form</div>
					<div class="panel-body">
						<!--User Login Form-->
						<form onsubmit="return false" id="login">
						<?php
							?>
						<div class=" text-center">
							<div id="e_msg"></div></div><?php ?>
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" id="email" required/>
							<label for="email">Password</label>
							<input type="password" class="form-control" name="password" id="password" required/>
							<p><br/></p>
							<div class="container-fluid text-center" style="text-align:center; margin-left:30px;" >
							<div class="g-recaptcha" 
        data-sitekey="6LfYRwgeAAAAAD4VVfV1_FUFiqJHAHZNl4oQZoBp" 
        data-callback='onSubmit' 
        data-action='submit'></div>
		</div>
		<br>
							<a href="#" style="color:#333; list-style:none;">Forgotten Password</a><input type="submit" name="submit" class="btn btn-success" style="float:right;" Value="Login">
							<!--If user dont have an account then he/she will click on create account button-->
							<div><a href="customer_registration.php?register=1">Create a new account?</a></div>						
						</form>
				</div>
				
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	<script async src="https://www.google.com/recaptcha/api.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=6LfYRwgeAAAAAD4VVfV1_FUFiqJHAHZNl4oQZoBp"></script>

	<script>
		 grecaptcha.ready(function(){
    grecaptcha.render("container", {
      sitekey: "ABC-123"
    });
  });
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
   function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LfYRwgeAAAAAD4VVfV1_FUFiqJHAHZNl4oQZoBp', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
          });
        });
      }
 </script>
</body>
</html>






















