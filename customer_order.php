<?php
require "db.php";

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
		<style>
			table tr td {padding:10px;}
			.row a button{
				text-decoration: none;
				border: none;
				margin-left: 0px;
				font-size: large;
				font-weight: bold;
				text-align: center;
				padding: 10px;
				border-bottom:4px solid red;
				
				width:175px;
				background: transparent;
			}
			.row a button:hover{
				color: red;
				background:pink;
			}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid" style="background-color:black;">	
			<div class="navbar-header">
				<a href="#" class="navbar-brand" style="margin-left: 5px;color:white;">Hardcore Motorshop</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index2.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
				<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window">&nbsp;</span>Product</a></li>
				<li><a href="services.php"><span class="glyphicon glyphicon-globe">&nbsp;</span>Services</a></li>
				<li><a href="contactus.php"><span class="glyphicon glyphicon-earphone">&nbsp;</span>Contact Us</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="cart.php" id="cart_container" ><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>View Cart<span class="badge"></span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							
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
				<li><a href="cart.php" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">&nbsp;</span><?php $user=$_SESSION['name'];  echo "".$user; ?></a>
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
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
	<div class="row" style="margin: left -11px;">
		<div class="col-lg text-center">
			<br>
			<br>
			<table style=" text-align:center; ">
			<a href="customer_order.php" ><button style="background:pink;">Processing</button></a>
			<a href="preparing.php" ><button>Preparing</button></a>
			<a href="shipping.php"><button>To Ship</button></a>
			<a href="delivered.php"><button>Delivered</button></a>
			<a href="history.php"><button>History</button></a>
		
			</table>
		</div>
	</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						
						<hr/>
						<?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];
							$orders_list = "SELECT o.order_id,o.user_id,o.product_id,o.qty,o.trx_id,o.shipping,o.cancel,o.receive,o.p_status,p.product_title,p.product_price,p.product_image,product_desc FROM processing o,products p WHERE o.user_id='$user_id' AND o.product_id=p.product_id";
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									?><hr>
										<div class="row">
											<div class="col-md-3">
												<img style="float:right;" src="product_images/<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col lg">
												<table>
													<?php $price = $row["product_price"]; 
															$qty = $row["qty"];
															$total = $price * $qty;
													?>
													<form action="action.php" method="POST">
													<tr><td>Product Name</td><td><b><?php echo $row["product_title"]; ?></b> </td></tr>
													<tr><td>Status</td><td><b><?php echo $row["shipping"]; ?></b> </td></tr>
													<tr><td>Description</td><td><b><?php echo $row["product_desc"]; ?></b> </td></tr>
													<tr><td>Product Price</td><td><b><?php echo  CURRENCY." " .$total ?></b></td></tr>
													<tr><td>Quantity</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
													<tr><td>Transaction Id</td><td><b><?php echo $row["trx_id"]; ?></b></td>
													<input type="hidden" name="canceled" value="Requesting cancel">
													<input type="hidden" name="trx_id" value="<?php echo $row["trx_id"]; ?>">
													<input type="hidden" name="trx1" value="<?php echo $row["order_id"]; ?>">
													<?php $cancel = $row["cancel"]; if(!empty($cancel)){ echo'<td><input style="float:right;" type="submit" name="cancel" class="btn btn-danger" value="'.$row['cancel'].'"></td>';}?>
													<?php $receive = $row["receive"]; if(!empty($receive)){ echo'<td><input style="float:right;" type="submit" name="receive" class="btn btn-success" value="'.$row['receive'].'"></td></tr>';}?>
													</form>
												</table>
								
											</div>
										</div>
										<hr>
									<?php
								}
							}
						?>
						
</div>
</div>
<div class="panel-footer" style=" text-align:center;"><strong> Hardcore Motorshop All Copyright Reserved &copy; 2022 Team Singertunado</strong></div>
			</div>
			<div class="col-md-2"></div>
		
	</div>
</body>
</html>
















































