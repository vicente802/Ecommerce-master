<?php
require "../config/constants.php";
session_start();
if(isset($_SESSION['uid'])){
   
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hardcore Motorshop</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../bootstrap.css"/>
		<script src="../js/jquery2.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../main.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<style></style>
	</head>
<body>
<div class="navbar navbar-inverse navbar-expand-lg navbar-fixed-top">
		<div class="container-fluid" style="background-color:black;">	
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
				<li><a href="../index.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
				<li><a href="../index1.php"><span class="glyphicon glyphicon-modal-window">&nbsp;</span>Product</a></li>
				<li><a href="../services/services.php"><span class="glyphicon glyphicon-globe">&nbsp;</span>Services</a></li>
				<li><a href="../contact/contactus.php"><span class="glyphicon glyphicon-earphone">&nbsp;</span>Contact Us</a></li>
			
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../cart1.php" id="cart_container"  ><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>View Cart<span class="badge"></span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								
							<div class="panel-body">
								<div id="cart_product">
								
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="../login_form.php" ><span class="glyphicon glyphicon-user">&nbsp;</span>SignIn</a>	
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
 if(isset($_POST['submit'])){
		?><div class="container alert alert-danger text-center" style="width:40%; text-align:center;"><?php echo"You Need to login first"; ?></div>	</div></div><?php
}
	?>
    <form class="contact-form" action="" method="post">
        <input type="text" class="contact-form-text" placeholder="Your name" name="name">
        <input type="text"class="contact-form-text" placeholder="Your email" name="email">
        <input type="text" class="contact-form-text" placeholder="Your number" name="number">
        <textarea class="contact-form-text" placeholder=" Your Message" name="message"></textarea>
        <center><input type="submit" class="contact-form-btn" name="submit" value="Send"></center>
    </form>

	<br>
    <div class="panel-footer " style="background:tomato; color:white; margin-top:15px;"><p></p>
      <footer class="footer">
          <div class="container">
              <div class="row" style="background:tomato;">
                  <div class="footer-col">
                      
                      <ul style="text-align:center;">
                      <h4 style="font-size:20px;">Follow and Contact Us !</h4>
                          <a href="https://www.facebook.com/HardcoreMotor"><a style="color:white; font-size:20px;" class="fa fa-facebook-f">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</style><u style="font-size: 18px; color:white;">https://www.facebook.com/HardcoreMotor</u></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="#"><i style="color:white; font-size:25px;" class="fa fa-phone">&nbsp;&nbsp;&nbsp;&nbsp;</style><u style="font-size: 18px; color: white;">09993827634</u></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;<img src="../imgs/GCASH.png" style="width:70px; margin-left:-20px; margin-top: -9px;">&nbsp;&nbsp;</style><u style="font-size: 18px; color:white; margin-left:5px;">09993827634 Ariel A.</u>
                          
                  </ul>  
                    </div>
                </div>
            </div>
        </div>


    </div>


	
	<div class="panel-footer" style="text-align: center; "><strong> Hardcore Motorshop All Copyright Reserved &copy; 2022 Team Singertunado</strong></div>
				</div>
			</div>
			<div class="col-md-1"></div></div>
			
		</div>
	</div>
</body>
</html>
















































