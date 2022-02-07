<?php
require "config/constants.php";
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		
		<style>
			body{
    margin: 20px;
    padding: 0;
    background-color:white;
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center center;
    height: auto;
    font-family: poppins;
}
.wrapper{
    width: 1170px;
    margin: 5% auto;
}
.wrapper h2{
    text-transform: uppercase;
    font-family: poppins;
    font-weight: bold;
    text-align: center;
    font-size: 60px;
    color: #fff;
    margin: 0;
}
.single-service {
position: relative;
width: 31%;
height:auto;
background: #A0E7E5;
box-sizing: content-box;
padding: 0 0px;
transition: .5s;
overflow: hidden;
float: left;
margin: 0 10px;
text-align: center;
margin-top:10px;
}
.line {
width: 150px;
height: 3px;
background: #fff;
margin: 0 auto 60px auto;
}
.single-service p{            
   
    font-size: 14px;
	line-height: 28px;
	height: 145px;
	overflow: hidden;
}
.single-service h3 {
    font-size: 25px;
    text-transform: uppercase;
    font-family: poppins;
    letter-spacing: 1px;  
}
.readmore-btn{
	margin-top:100px;
	position:relative;
}
.single-service a {
	display: auto;
	color: #fff;
	background-color: #2196f3;
	text-decoration: none;
	padding: 10px 15px;
	border-radius: auto;
	margin-top: 15px;
}
.single-service a {
	box-shadow : 0 5px 5px rgba(0,0,0,0,2);
}
.single-service.showContent p{
	height: auto;
}
.single-service.showContent a.readmore-btn{
	background-color: red;
}
.single-service a:hover{
	box-shadow: 0 5px 5px rgba(0,0,0,0,2)
}
.social {
width: 60px;
height: auto;
border-radius: 50%;
margin: 5% auto;
}
.social i {
font-size: 30px;
padding: 15px;

}
.single-service:hover{
    box-shadow: 0 30px 35px rgba(0,0,0,0.7);
}
.single-service span {
position: relative;
top: 0;
left: -110%;
width: 100%;
height: 100%;
transition: .7s;
transform: skewX(10deg);
}
.single-service:hover span{
    left: 110%;
}

@media (max-width:1000px){
    .wrapper {
width: 100%;
}
.single-service {
width: 95%;
margin-bottom: 30px;
}
.wrapper h2 {
font-size: 30px;


}
footer{
	background: rgb(0, 91, 143);
	position: relative;
	alignment: bottom;
}
a:link{
	color: #fff;
	text-decoration: none;
}
a:visited{
	color: #fff;
	text-decoration: none
}
a:hover{
	color: #fff;
	text-decoration: none
}
a:active{
	color: #fff;
	text-decoration: none

}
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
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Hardcore Motorshop</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
				<li><a href="services.php"><span class="glyphicon glyphicon-globe"></span>Service</a></li>
			</ul>
			<form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search" id="search">
		        </div>
		        <button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
		     </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in <?php echo CURRENCY; ?></div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
					<ul class="dropdown-menu">
						<div style="width:300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading">
									<form onsubmit="return false" id="login">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" id="email" required/>
										<label for="email">Password</label>
										<input type="password" class="form-control" name="password" id="password" required/>
										<p><br/></p>
										<a href="#" style="color:white; list-style:none;">Forgotten Password</a><input type="submit" name="submit" class="btn btn-success" style="float:right;">
									</form>
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>	
	<div class="wrapper">
<div class="line">
	<h1>SERVICES</h1>
</div>
<div class="single-service">
      <div class="social">
	  <i class="fa fa-cogs"></i>
<span></span></div>
       <h3>
	   BATTERY REPLACEMENT/INSTALL</h3>
<p>
How Long Does a Car Battery Last For your Vehicle?
When your motor doesn't start it often seems at the most inconvenient of times.  As you know, motor batteries only last so long.
Avoid this trouble of your vehicle not starting and contact (SHOP) if you need motorcycle battery replacement.
We will recycle your old battery and install a new, high-quality leading-brand battery.</p>
<a href="javascript:void();" Class="readmore-btn">Read More</a>
<div></div>
<br>
</div>
<div class="single-service">
      <div class="social">
<i class="fa fa-cogs"></i>
<span></span></div>
       <h3>
	   MUFFLER & EXHAUST SYSTEMS</h3>
<p>Why is Muffler and Exhaust Systems Important For Your Vehicle?
Your motor is not only has to help keep you safe, but it should also help maintain our environment with limited pollution.
Most people think exhaust systems are only for reducing noise pollution, but they are also installed to reduce harmful emissions into our atmosphere.
Keep in mind that a properly functioning muffler and exhaust system should not only be quieter,
but it should also help with these primary.
<br><br>
Reduce noise pollution for you and others
Maintain air quality for you and your family
Help the community by maintaining quality atmosphere.
</p>
<a href="javascript:void();" Class="readmore-btn">Read More</a>
<div></div>
<br>
</div>

<div class="single-service">
      <div class="social">
	  <i class="fa fa-cogs"></i></div>
<span></span>
       <h3>
	   TIRE
	 <br>  
	   SALES</h3>
<p>
Your Best Choice For All Major Brands of New Tires For Your Vehicle!
The tire specialists at (shop) proudly offer all major brands of new tires for our customers.
We keep a variety of popular tire brands for motorcycle tires at our tire service location in.
Ask us about any of your favorite tire brands.
<br><br>
Why Choose (shop) For Your New Tires?
AAA Approved Auto Repair Shop
FREE Shuttle
Friendly Staff
Complete Auto Repair Service
</p>
<a href="javascript:void();" Class="readmore-btn">Read More</a>
<div></div>
<br>
</div>


<br>
<br>
<br>

			<div class="col-md-5"></div>
		</div>
	</div>
	<br>
	<br>
	<footer>
		
		<div class="container" style="padding: 80px;" align="bottom">
		<a href="https://www.facebook.com/HardcoreMotor">
			<i class=" fa fa-facebook fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
		</a>
		<a href="#">
			<i class=" fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
		</a>
		<a href="#">
			<i class=" fa fa-google-plus fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
		</a>
		<a href="#">
			<i class=" fa fa-linkedin fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
		</a>
		<a href="#">
			<i class=" fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
		</a>
		<a href="#">
			<i class=" fa fa-pinterest fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
		</a>
</div>
<div style="background: #004872;">
<p style="color: #91BEC2; padding: 15px 0;" align="center">
&copy; 2021 Copyright: <a href="Hardcoremotorshop@gmail.com"></a>
</p>
</div>
</footer>





	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
	<script>
		$(".readmore-btn").on('click', function(){
			$(this).parent().toggleClass("showContent");

			// Shorthand if-else statement
			var replaceText = $(this).parent().hasClass("showContent") ? "Read Less" : "Read More";
			$(this).text(replaceText);
		});
	</script>
	
</body>
</html>
















































