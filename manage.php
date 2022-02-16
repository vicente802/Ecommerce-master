<?php
require "db.php";
session_start();
if(isset($_SESSION["uid"])){
	$category_query = "SELECT * FROM user_info ";
    $run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
    if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $password = $row['password'];
            $address1 = $row['address1'];
            $address2 = $row['address2'];
        }
		}
    }
        if(isset($_POST['submit'])){
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $mail = $_POST['email'];
            $num = $_POST['contact'];
            $add = $_POST['address'];
            $city = $_POST['city'];
            $curr = $_POST['current'];
            $curr = md5($curr);
            $new = $_POST['newpass'];
            $retype = $_POST['retype'];
            $password = $row['password'];
       if($new != $retype){
            echo'<script>alert("Password not matched")</script>';
        }
        else if($password == $curr){
            $new = md5($new);
            $sql1 = "UPDATE user_info set first_name='$fname', last_name='$lname', email='$email', 
            mobile='$num', address1='$add',address2='$city', password='$new'";
            mysqli_query($con,$sql1);
            echo'<script>alert("Updated Successfully")</script>';
        }
            else{
                echo'<script>alert("Current password error")</script>';
            }
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
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
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
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
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
	<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edit Profile</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-2">
        <div class="text-center">
          
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-8 personal-info text-center">
        
        <h3>Personal info</h3>
        <br>
        <form class="form-horizontal" action="" method="POST">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="firstname" value="<?php echo $firstname;?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="lastname" value="<?php echo $lastname;?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" name="email" value="<?php echo $email ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Contact Number: </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="contact" maxlength="14" value="+63 <?php echo $mobile ?> ">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="address" value="<?php echo $address1?>">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-3 control-label">Municipality/City:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="city" value="<?php echo $address2 ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Current Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="" name="current" placeholder="Enter Your Current Password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">New Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="newpass" value=""  placeholder="Enter New Password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Retype Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="retype" value=""  placeholder="Retype Your Password">
            </div>
          </div>
          <div class="col text-right" style="margin-right: 60px;">
          <input type="submit" class="btn btn-primary " name="submit" value="Submit">
          </div>
          </div>
        </form>
  </div>
</div>
<hr>
</body>
</html>
















































