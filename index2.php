<?php
require "config/constants.php";
session_start();
if(!isset($_SESSION['uid'])){
	header('location: index.php');
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
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Poppins&display=swap');

html {
  scroll-behavior: smooth;
}

.container{
	background: whitesmoke;
}

#carousel {
  box-shadow: 0 15px 25px -10px;
  background-color: whitesmoke;
  margin-top: 500px;
  width:100%;
  
  float: center;
  height:500px;

  
}
.carousel-inner{
	padding: -10px;
	width: 100%;
	position: relative;
	height: 500px;
	overflow: hidden;
	margin-top: 1px;
	background-color: whitesmoke;
}
.item img{
	position: relative;
	width: 110%;
	margin-top: -70px;	
	padding: -50px;
}

.location {
  box-shadow: 13px 13px 13px;
  position: relative;
  width: 100%;
}


a {
text-decoration: none;

}

h1 {
font-size: 4em;
font-family: 'Montserrat', sans-serif;
}

h2 {
font-size: 4rem;
font-family: 'Poppins', sans-serif;
}

p {
font-family: 'Poppins', sans-serif;
font-size: 1.3em;
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
<a href="#" class="navbar-brand" style="margin-left: 5px; color:white;">Hardcore Motorshop</a>
</div>
<div class="collapse navbar-collapse" id="collapse">
<ul class="nav navbar-nav">
<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
<li><a href="index1.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>

<li><a href="services/services.php"><span class="glyphicon glyphicon-globe"></span>Services</a></li>
<li><a href="contactus.php"><span class="glyphicon glyphicon-earphone"></span>Contact Us</a></li>


</ul>
<form class="navbar-form navbar-left">
<div class="form-group">
<input type="text" class="form-control" placeholder="Search" id="search">
</div>
<button type="submit" class="btn btn-primary" id="search_btn"><span class=""></span>Search</button>
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
<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php $user=$_SESSION['name'];  echo "".$user; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
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


<div class="my-5" style="margin-top: 80px;">
<v class="container">
<div class="row-ml-4">
<div class="col-md-7">
<img class="logo" src="imgs/index-logo.PNG" alt="logo" width="650px">
</div>
<div class="col-md-5">
<h1 class="mt-5">About Us</h1>
<p>We started from the year (2019). Our business come up with website so we can reach more, help more. Hardcore Motorshop offers servicing and selling motor parts that are affordable and quality.</p>
<p class="mt-4">

</p>
<a href="login_form.php" style="text-decoration: none;"><button type="button" class="btn btn-primary btn-lg">Shop Now</button></a>
</div>
</div>				

<div class="container-fluid text-center">
	<?php include 'include/products.php';?>
</div>

<div></div>


<div class="container-fluid text-center" id="carousel" style="margin-top: 100px;">
<div id="myCarousel" class="carousel slide"  data-bs-interval="6000" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" ></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="imgs/map-1.PNG" alt="map-1">
	  <div class="carousel-caption d-none d-md-block">
      </div>
	</div>

    <div class="item">
      <img src="imgs/map-2.PNG" alt="map-2">
    </div>

    <div class="item">
      <img src="imgs/map-3.PNG" style="margin-top: 0px;" alt="map-3">
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<br>
<br>
<br>
<?php
include "include/services.php";
?>
<div><br>
<br>
<br>
<br></div>
<div class="container-fluid text-center">
  <h2>Come to Our Physical Store</h2>
  <p><b>Address:</b> Langit Rd, Phase 1 Package 3, Caloocan, Metro Manila</p>
  <p>Beside Lotto Outlet Near Cebuana Lhuiller Pawnshop</p>

  <br>

  <div class="container-fluid text-center">
    <p><iframe class="location" src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d226.59636996729037!2d121.04636301825435!3d14.774423646662418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d14.7744393!2d121.0464118!5e1!3m2!1sen!2sph!4v1645036947055!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
  </div>
</div>



<br>
<br>
<br>
<br>
<br>

<div class="panel-footer" style="text-align: center;"> Hardcore Motorshop &copy; 2022</div>

</body>
</html>	