<?php
require "config/constants.php";
session_start();
if(isset($_SESSION["uid"])){
	
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
        /* Base CSS */
        
    
        
        img {
            max-width: 100%;
            height: auto;
        }
        
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0 0 15px;
            font-weight: 700;
        }
        

      
        /*custom css*/
        
       
        
        .section-header p {
            font-size: 18px;
        }
        
        .single-service {
            border: 1px solid #ebebeb;
            text-align: center;
            background: #fff;
        }
        
        .service-bg {
            height: 200px;
            position: relative;
        }
        .service-bg h2 {
            color: #fff;
            background: tomato;
            border: 1px solid tomato;
            font-size: 17px;
            text-align: center;
            font-weight: 700;
            padding: 15px;
            position: absolute;
            left: 8%;
            width: 84%;
            margin: 0;
            bottom: -25px;
            border-radius: 50px;
            letter-spacing: 2px;
        }
        
        .single-service:hover .service-bg h2 {
            background: #fff;
            transition: .9s;
            color: tomato;
        }
        
        .service-text {
            padding: 50px 30px 20px;
            font-size: 15px;
            font-weight: 400;
            overflow:hidden;
            height:auto;
            text-align:left;
        }
        
        .service-text p:last-child {
            margin: 0;
            line-height: 1.3;
        }
        
       
.single-service:hover{
    box-shadow: -2px 0px 65px 2px rgba(0,0,0,0.51);
-webkit-box-shadow: -2px 0px 65px 2px rgba(0,0,0,0.51);
-moz-box-shadow: -2px 0px 65px 2px rgba(0,0,0,0.51);
}

    </style>
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
				<a href="#" class="navbar-brand" style="margin-left: 5px;">Hardcore Motorshop</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index1.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
				<li><a href="services.php"><span class="glyphicon glyphicon-globe"></span>Services</a></li>
				<li><a href="contactus.php"><span class="glyphicon glyphicon-earphone"></span>Contact Us</a></li>
				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3 col-xs-3">Sl.No</div>
									<div class="col-md-3 col-xs-3">Product Image</div>
									<div class="col-md-3 col-xs-3">Product Name</div>
									<div class="col-md-3 col-xs-3">Price in <?php echo CURRENCY; ?></div>
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
						<li><a href="" style="text-decoration:none; color:blue;">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
					</ul>
				</li>
					
				</li>
			</ul>
		</div>
	</div>
</div>	


    <div class="container">
        <div class="row">
            <div class="col-md-20">
                <div class="section-header" style="text-align: center; margin-bottom: 30px; margin-top: 15px;">
                    <h1 style="margin-top: 100px;">Our Services</h1>
                    <p>Some of our recent works that we finished so far. </p>
                </div>
            </div>
        </div>
     
        <div class="row"    >
            <div class="col-md-8">
                <div class="single-service">
                    <div class="service-bg
                        service-bg-1" style=" background: url('imgs/11.jpg');
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center;">
                        <a href="#" class="show_hide" data-content="toggle-text">Read More</a>
<div class="content">Testing
  <ul>
    <li>first</li>
  </ul>
</div>
                        <h2>BATTERY REPLACEMENT/INSTALL</h2>
                    </div>
                    <div class="service-text">
                        <p>How Long Does a Car Battery Last For your Vehicle? When your motor doesn't start it often seems at the most inconvenient of times. As you know, motor batteries only last so long. Avoid this trouble of your vehicle not starting
                            and contact (SHOP) if you need motorcycle battery replacement. We will recycle your old battery and install a new, high-quality leading-brand battery.</p>
                            
</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-service">
                    <div class="service-bg
                        service-bg-2" style="
                        background: url('imgs/2.jpg');
                        -webkit-background-size: cover;
                             background-size: cover;
            background-position: center;
        ">
                        <h2>MUFFLER & EXHAUST SYSTEMS</h2>
                    </div>
                    <div class="service-text">
                        <p>Why is Muffler and Exhaust Systems Important For Your Vehicle? Your motor is not only has to help keep you safe, but it should also help maintain our environment with limited pollution. Most people think exhaust systems are only
                            for reducing noise pollution, but they are also installed to reduce harmful emissions into our atmosphere.</p>
                            
                    </div>
                </div>
            </div>
            <div>
            <div class="col-md-4">
                <div class="single-service">
                    <div class="service-bg
                        service-bg-3" style="
            background: url('imgs/3.jpg');
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center;
        ">
                        <h2>TIRE
                            <br> SALES</h2>
                    </div>
                    <div class="service-text">
                        <p>our Best Choice For All Major Brands of New Tires For Your Vehicle! The tire specialists at (shop) proudly offer all major brands of new tires for our customers. We keep a variety of popular tire brands for motorcycle tires at
                            our tire service location in. Ask us about any of your favorite tire brands. Why Choose (shop) For Your New Tires? AAA Approved Auto Repair Shop FREE Shuttle Friendly Staff Complete Auto Repair Service</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-service">
                    <div class="service-bg
                        service-bg-4" style="
            background: url('imgs/4.jpg');
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center;
        ">
                        <h2>WHEEL <br>ALIGNMENT</h2>
                    </div>
                    <div class="service-text">
                        <p>Everything You Need to Know About Wheel Alignment Services!
                            With every wheel alignment, the (TITLE) perform a complete steering and suspension system inspection. In fact, there is not much we don't do when it comes to car alignment or front alignment. Here are the AAA approved wheel alignment services we provide:

            Inspect your vehicle's suspension and steering
    Adjust alignment angles to specifications
Tire Rotation & Balance</p>
                      
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-service">
                    <div class="service-bg
                        service-bg-5" style="
            background: url('imgs/5.jpg');
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center;
        ">
                        <h2>CHANGE<br>OIL</h2>
                    </div>
                    <div class="service-text">
                        <p>How Often Do You Get an Oil Change For your Vehicle?
                            Why not come to (SHOP) for your next oil change? As you know, an changing an oil for your vehicle is a necessity, and most owner’s manuals and expert mechanic recommend an oil change at least every 3 months. Your motorcycle engine puts extreme pressure on the oil, and eventually the oil loses its lubricant qualities. When that happens, the oil can't cool, clean or lubricate the engine’s components.</p>
                        
                    </div>
                </div>
            </div>
          
            </div>

        </div>
        </div>
      
</div>
<br>
<div class="panel-footer text-center" style="background:black; color:white;"><p></p>
      <footer class="footer">
          <div class="container">
              <div class="row">
                  <div class="footer-col">
                      <h4>Follow Us !</h4>
                      <ul>
                          <div class=" col">
                          <a href="#"><i style="color: white; font-size:30px;" class="fa fa-facebook-f"></i></a>
                          &nbsp; <a href="#"><i style="color: white; font-size:30px;" class="fa fa-phone"></i></a>
                          &nbsp; <a href="#"><i style="color: white; font-size:30px;" class="fa fa-instagram"></i></a>
                          &nbsp;<a href="#"><i style="color: white; font-size:30px;" class="fa fa-google"></i></a>
</div>
                        </ul>  
                    </div>
                </div>
            </div>
        </div>


    </div>
        <script src="js/bootstrap.min.js"></script>








	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
	<script>
		
	</script>
	
</body>
</html>
















































