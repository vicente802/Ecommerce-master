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
    margin: 0;
    padding: 0;
    background-image: url(https://i.postimg.cc/dQZssk2d/1.jpg);
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center center;
    height: 90vh;
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
height: 320px;
background: #fff;
box-sizing: border-box;
padding: 0 15px;
transition: .5s;
overflow: hidden;
float: left;
margin: 0 10px;
text-align: center;
}
.line {
width: 150px;
height: 3px;
background: #fff;
margin: 0 auto 60px auto;
}
.single-service p{            
    color: #262626;
    font-size: 14px;
}
.single-service h3 {
    font-size: 25px;
    text-transform: uppercase;
    font-family: poppins;
    letter-spacing: 1px;
    color: #262626;
}
.social {
width: 60px;
height: 60px;
background: #262626;
border-radius: 50%;
margin: 5% auto;
}
.social i {
font-size: 30px;
padding: 15px;
    color: #fff;
}
.single-service:hover{
    box-shadow: 0 30px 35px rgba(0,0,0,0.7);
}
.single-service span {
position: absolute;
top: 0;
left: -110%;
width: 100%;
height: 100%;
background: rgba(0,0,0,0.7);
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
				<li><a href="services.php"><span class="glyphicon glyphicon-modal-window"></span>Service</a></li>
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
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="wrapper">
  <h2>
Services</h2>
<div class="line">
</div>
<div class="single-service">
      <div class="social">
<i class="fa fa-codepen"></i></div>
<span></span>
       <h3>
Web Design</h3>
<p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et delectus, in veritatis veniam non praesentium corporis dolorum necessitatibus. Culpa odio enim amet praesentium illo voluptates ab quidem, nam consequuntur. Natus.</p>
</div>
<div class="single-service">
      <div class="social">
<i class="fa fa-cogs"></i></div>
<span></span>
       <h3>
ui / ux design</h3>
<p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et delectus, in veritatis veniam non praesentium corporis dolorum necessitatibus. Culpa odio enim amet praesentium illo voluptates ab quidem, nam consequuntur. Natus.</p>
</div>
<div class="single-service">
      <div class="social">
<i class="fa fa-diamond"></i></div>
<span></span>
       <h3>
Graphics design</h3>
<p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et delectus, in veritatis veniam non praesentium corporis dolorum necessitatibus. Culpa odio enim amet praesentium illo voluptates ab quidem, nam consequuntur. Natus.</p>
</div>
</div>		
					<div class="panel-footer">&copy; 2022</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>
















































