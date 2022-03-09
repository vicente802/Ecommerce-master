<?php
require "config/constants.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:login_form.php");
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
			body{
				background-color:smokewhite;
			}
		</style>
	</head>
<body style=" background-color: smokewhite;">
<div class="wait overlay">
	<div class="loader"></div>
</div>
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
				<li><a href="index2.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
				<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window">&nbsp;</span>Product</a></li>
				<li><a href="services.php"><span class="glyphicon glyphicon-globe">&nbsp;</span>Services</a></li>
				<li><a href="contactus.php"><span class="glyphicon glyphicon-earphone">&nbsp;</span>Contact Us</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="cart.php" id="cart_container" ><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>View Cart<span class="badge"></span></a>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp;<span class="glyphicon glyphicon-user">&nbsp;</span><?php $user=$_SESSION['name'];  echo "".$user; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;">&nbsp;<span class="">View Cart</a></li>
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
	<div class="container-fluid">
		
		<div class="row">
			
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<div id="get_brand">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
			</div>
			<div class="col-md-8">	
				
				<div class="panel panel-info" id="scroll">
					
					<div class="panel-heading">Products <ul style="list-style:none; margin-top:-8px; float:right;">
					<li style="float:right;"><button class="btn btn-primary" id="search_btn">Search</button></li>
			<li style="width:300px; float:right"><input type="text" class="form-control" id="search"></li>
				
		</ul></div>
					<div class="panel-body">
						<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="product_images/images.JPG"/>
								</div>
								<div class="panel-heading">$.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
					</div>
					<div class="row">
			<div class="col-md-16">
				<center>
					<ul class="pagination" id="pageno">
						<li><a href="#">1</a></li>
						
					</ul>
				</center>
			
		
				
			</div>
		</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>

		<div class="panel-footer " style="background:tomato; color:white; margin-top:15px;"><p></p>
      <footer class="footer">
          <div class="container">
              <div class="row" style="background:tomato;">
                  <div class="footer-col">
                      
                      <ul style="text-align:center;">
                      <h4 style="font-size:20px;">Follow and Contact Us !</h4>
                          <a href="https://www.facebook.com/HardcoreMotor"><i style="color:white; font-size:20px;" class="fa fa-facebook-f">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</style><u style="font-size: 18px; color:white;">https://www.facebook.com/HardcoreMotor</u></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="#"><i style="color:white; font-size:25px;" class="fa fa-phone">&nbsp;&nbsp;&nbsp;&nbsp;</style><u style="font-size: 18px; color: white;">09993827634</u></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;<img src="./imgs/GCASH.png" style="width:70px; margin-left:-20px; margin-top: -9px;">&nbsp;&nbsp;</style><u style="font-size: 18px; color:white; margin-left:5px;">09993827634 Ariel A.</u>
                          
                  </ul>  
                    </div>
                </div>
            </div>
        </div>


    </div>

		
		<div class="panel-footer" style="text-align: center;"><strong> Hardcore Motorshop All Copyright Reserved &copy; 2022 Team Singertunado</strong></div>
	</div>
	<div class='modal fade' id='detailsModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
			<div class="row" style="text-align: right; margin-right:1px">
				<div class="col-md-1"></div>
<div class="col-md">
	
		<a href="profile.php"><button type='button' class='btn btn-secondary' data-dismiss=''>&times;</button></a>
		</div>
		</div>
            <div class='modal-content'>
			<div class="row">
					
					<div class="col-md-12 col-xs-12" id="product_msg">
						
					</div>
				</div>
                <div class='modal-body' id="detailsModalBody">
                </div>
                <div class='modal-footer'>
                   
                </div>
            </div>
        </div>
    </div>
	<script>
        $(document).on('click' , '.details-btn' ,function (){
            var product_id = $(this).attr('id');
            $.ajax({
                url: "getProductDetails.php",
                method: "POST",
                data: { product_id: product_id },
                success: function(data) {
                    $('#detailsModalBody').html(data);
                    $('#detailsModal').modal('show');
                }
            })
        });
    </script>
</body>
</html>
















































