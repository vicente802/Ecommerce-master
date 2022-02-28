<?php
session_start();
require "config/constants.php";

?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hardcore Motorshop</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="bootstrap.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style></style>
	</head>
<body>
<div class="navbar navbar-inverse navbar-expand-lg navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand" style="margin-left: 5px;color:white;">Hardcore Motorshop</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index2.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
				<li><a href="services.php"><span class="glyphicon glyphicon-globe"></span>Services</a></li>
				<li><a href="contactus.php"><span class="glyphicon glyphicon-earphone"></span>Contact Us</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="cart.php" id="cart_container" ><span class="glyphicon glyphicon-shopping-cart"></span>View Cart<span class="badge"></span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php $user=$_SESSION['name'];  echo "".$user; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="">Cart</a></li>
						<li class="divider"></li>
						<li><a href="customer_order.php" style="text-decoration:none; color:blue;"> Orders</a></li>
						<li class="divider"></li>
						<li><a href="manage.php" style="text-decoration:none; color:blue;">Manage</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	
    <h1 style="text-align:center; margin-top:10px;">Contact Us</h1>
    <div class="border"></div>
	
	<?php
	if(isset($_SESSION['uid'])){

	 if(isset($_POST['submit'])){
		$full = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['number'];
		$message = $_POST['message'];
	

		if(empty($full) || empty($email) || empty($phone) || empty($message)){
			?><div class="container alert alert-danger text-center" style="width:40%; text-align:center;"><?php
			echo "Fill Up the Form";
			?>
</div>
	
	<?php } else {
		  $to_email = "handayanv@gmail.com";
		  $subject = "Hardcore Motorshop Concern";
		  $body = $message;
		  $headers = $email;
  ?><div class="container alert alert-success text-center" style="width: 40%; text-align:center;"><?php
  if (mail($to_email, $subject, $body, $headers)) {
	  echo "Email successfully sent...";
  ?></div><?php
  }else {
	  echo "Email sending failed...";
  }
	} 
}
}?>
    <form class="contact-form" action="" method="post">
        <input type="text" class="contact-form-text" placeholder="Your name" name="name">
        <input type="text"class="contact-form-text" placeholder="Your email" name="email">
        <input type="text" class="contact-form-text" placeholder="Your number" name="number">
        <textarea class="contact-form-text" placeholder=" Your Message" name="message"></textarea>
        <input type="submit" class="contact-form-btn" name="submit" value="Send">
    </form>

	<br>
    
	
					<div class="panel-footer" style="text-align: center;"> Hardcore Motorshop &copy; 2022</div>
				</div>
			</div>
			<div class="col-md-1"></div></div>
			
		</div>
	</div>
</body>
</html>
















































