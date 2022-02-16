<?php
require "config/constants.php";

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
				<a href="#" class="navbar-brand" style="margin-left: 5px;">Hardcore Motorshop</a>
			</div>
			<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index1.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
	
				<li><a href="services.php"><span class="glyphicon glyphicon-modal-window"></span>Services</a></li>
				<li><a href="contactus.php"><span class="glyphicon glyphicon-modal-window"></span>Contact Us</a></li>
			

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
				<li><a href="login_form.php" ><span class="glyphicon glyphicon-user"></span>SignIn</a>
					
				</li>
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	
	
	<div class="my-5">
	<div class="container">
        <div class="row">
          <div class="col-md-7">
			<img src="imgs/logo.PNG" alt="logo" width="650px">
          </div>
          <div class="col-md-5">
            <h1 class="mt-5">Hardcore Motorshop</h1>
			<h2>About Us</h2>
            <p class="mt-4">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia
              veniam suscipit accusantium quibusdam dicta nesciunt esse? Id
              itaque incidunt sint distinctio voluptatem tempore tempora aliquam
              sunt, vel, repellat velit. Vel!
            </p>
			<a href="login_form.php" style="text-decoration: none;"><button type="button" class="btn btn-primary btn-lg">Shop Now</button></a>
          </div>
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








































































