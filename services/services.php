<?php
require "../config/constants.php";
session_start();
if(!isset($_SESSION["uid"])){
	

if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Hardcore Motorshop</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<script src="../js/jquery2.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../main.js"></script>
		<link rel="stylesheet" type="text/css" href="../style.css">
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
				<a href="#" class="navbar-brand" style="margin-left: 5px;color:white;">Hardcore Motorshop</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="../index.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
				<li><a href="../index1.php"><span class="glyphicon glyphicon-modal-window">&nbsp;</span>Product</a></li>
				<li><a href="services.php"><span class="glyphicon glyphicon-globe">&nbsp;</span>Services</a></li>
				<li><a href="../contact/contactus.php"><span class="glyphicon glyphicon-earphone">&nbsp;</span>Contact Us</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../cart1.php" id="cart_container"><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>View Cart<span class="badge"></span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							
							<div class="panel-body">
								<div id="cart_product">
								
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				
                <li><a href="../login_form.php" ><span class="glyphicon glyphicon-user">&nbsp;</span>SignIn</a>
				</li>
			</ul>
		</div>
	</div>
</div>	

<?php
        include 'service.php';
?>
    
<br>
<div class="panel-footer " style="background:tomato; color:white;"><p></p>
      <footer class="footer">
          <div class="container">
              <div class="row">
                  <div class="footer-col">
                      
                      <ul style="text-align:center;">
                      <h4 style="font-size:20px;">Follow and Contact Us !</h4>
                          <a href="https://www.facebook.com/HardcoreMotor"><i style="color:white; font-size:20px;" class="fa fa-facebook-f">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</style><u style="font-size: 18px; color:white;">https://www.facebook.com/HardcoreMotor</u></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="#"><i style="color:white; font-size:25px;" class="fa fa-phone">&nbsp;&nbsp;&nbsp;&nbsp;</style><u style="font-size: 18px; color: white;">09993827634</u></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;<img src="../imgs/GCASH.png" style="width:70px; margin-left:-20px; margin-top: -9px;">&nbsp;&nbsp;</style><u style="font-size: 18px; color:white; margin-left:5px;">09993827634 Ariel A.</u>
                          
                  </ul>  
                    </div>
                </div>
            </div>
        </div>


    </div>
        <script src="../js/bootstrap.min.js"></script>






        <div class="panel-footer" style="text-align: center; "><strong> Hardcore Motorshop All Copyright Reserved &copy; 2022 Team Singertunado</strong></div>

	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
	<script>
		function count_item() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { count_item: 1 },
            success: function(data) {
                $(".badge").html(data);
            }
        })
    }
	</script>
	
</body>
</html>