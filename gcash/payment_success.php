<?php
if(!isset($_SESSION['uid'])){
	header('location:../login_form.php');
}

session_start();
$shipping = "Processing";
$cm_user_id = $_SESSION['uid'];
$p_st = $_POST['p_status'];
$trx_id = $_POST['reference_number'];
$accname = $_POST['accname'];

if(empty($trx_id) || empty($accname)){
	echo '<script>alert("Input Account Name or Reference Number")</script>';
	header('location:../gcash.php');
}
else
{




}

	if ($p_st == "Pending") {


		include_once("../db.php");
		$sql = "SELECT p_id,qty FROM cart WHERE user_id = '$cm_user_id'";
	

		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			# code...
			while ($row=mysqli_fetch_array($query)) {
			$product_id[] = $row["p_id"];
			$qty[] = $row["qty"];
			
		
			}

			for ($i=0; $i < count($product_id); $i++) { 
			
				
				$cancel = "Cancel";
				$sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,p_status,shipping,cancel) VALUES ('$cm_user_id','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st','$shipping','$cancel')";
				$sql1 = "INSERT INTO processing (user_id,product_id,qty,trx_id,p_status,shipping,cancel) VALUES ('$cm_user_id','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st','$shipping','$cancel')";
				mysqli_query($con,$sql1);
				mysqli_query($con,$sql);
			
			}

			$sql = "DELETE FROM cart WHERE user_id = '$cm_user_id'";
			if (mysqli_query($con,$sql)) {
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
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						<div class="navbar navbar-inverse navbar-fixed-top">
							<div class="container-fluid">	
								<div class="navbar-header">
									<a href="#" class="navbar-brand">Hardcore Motorshop</a>
								</div>
								<ul class="nav navbar-nav">
									
<div class="navbar navbar-inverse navbar-expand-md navbar-fixed-top">
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
				<li><a href="index2.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
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
								</ul>
							</div>
						</div>
								<br>
								<br>
								<br>
						<div class="container-fluid" style="margin-top: 50px;">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Thankyou </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your payment process is 
											successfully completed and your Transaction id is <b><?php echo $trx_id; ?></b><br/>
											you can continue your Shopping <br/></p>
											<a href="../index1.php" name="continue" class="btn btn-success btn-lg">Continue Shopping</a>
										</div>
										<?php
										}
										$payment_method="Gcash";
											$order = mysqli_query($con, "SELECT * FROM orders");
											$product = mysqli_query($con, "SELECT * FROM products");
											if (mysqli_num_rows($order) > 0) {
											while ($row=mysqli_fetch_array($order)) {
												$qty = $row['qty'];
												$orderid = $row['order_id'];
												$product_id1 = $row['product_id'];
											}
										}
										if (mysqli_num_rows($product) > 0) {
											while ($row=mysqli_fetch_array($product)) {
												$product_qty = $row['product_qty'];
												
											}
										}
										$total = $product_qty - $qty;
										mysqli_query($con, "UPDATE products set product_qty='$total' WHERE product_id='$product_id1'");	
										mysqli_query($con, "UPDATE orders set payment_method='$payment_method'");	
										
											mysqli_query($con, "UPDATE processing set payment_method='$payment_method'");	
										}
										?>
										
										
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

			
				<?php
			
		}else{
			
				header('../gcash.php');
		}
		
	}
?>

















































