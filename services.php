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
        
        a:focus {
            outline: 0 solid
        }
        
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
        
        html,
        body {
            height: 100%;
            
        }
        
        a {
            -moz-transition: 0.3s;
            -o-transition: 0.3s;
            -webkittransition: 0.3s;
            transition: 0.3s;
            color: #333;
        }
        
        a:hover {
            text-decoration: none;
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
        
        .btn-area {
            display: inline-block;
            color: #333;
            font-size: 17px;
            font-weight: 700;
            margin-top: 30px;
            text-transform: capitalize;
        }
        .readmore-btn{
            margin-top:-10px;
            position:relative;
        }
        #more{
            display:none;
        }
        button{
   margin-top: 15px;
   display: block;
   background-color: #e41d3f;
   color: white;
   border:none;
   outline: none;
   padding: 8px 20px;
   text-transform: capitalize;
   cursor: pointer;
   font-size: 20px;
   text-align:center;
}
.single-service:hover{
    box-shadow: -2px 0px 65px 2px rgba(0,0,0,0.51);
-webkit-box-shadow: -2px 0px 65px 2px rgba(0,0,0,0.51);
-moz-box-shadow: -2px 0px 65px 2px rgba(0,0,0,0.51);
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
				<a href="#" class="navbar-brand active">Hardcore Motorshop</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
				<li><a href="services.php"><span class="glyphicon glyphicon-globe"></span>Service</a></li>
                <li><a href="contact/contactus.php"><span class="glyphicon glyphicon-globe"></span>Contact Us</a></li>

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
















































