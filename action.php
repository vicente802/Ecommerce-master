<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories ";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["page"])){
	$page = "SELECT * FROM products order by product_id desc";
	$run_query = mysqli_query($con,$page);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products order by product_id desc LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_desc = $row['product_desc'];
			echo "
				<div class='col-md-4'>
				<form action='viewcart.php' method='POST'>
							<div class='panel panel-info'>
								<div class='panel-heading' >$pro_title</div>
							
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:160px;'/>
								</div>
								<div class='panel-heading'>".CURRENCY." $pro_price.00
								<input type='text' name='prod_id' value=$pro_id>	
							<input type='submit' style='float:right;' class='btn btn-danger btn-xs' value='Details'>
								
							
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
							</form>
						</div>	
						
			";
			
		}
	}
}
if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id' order by product_qty desc";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id' order by product_qty desc";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_desc = $row['product_desc'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:160px;'/>
								</div>
								<div class='panel-heading'>Php.$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
		}
	}
	


	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";//not in video
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
				exit();
			}
			
		}
		
		
		
		
	}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty,product_desc,product_qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty,product_desc,product_qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$product_desc = $row["product_desc"];
				$product_qty = $row["product_qty"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				echo '
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3"><img class="img-responsive" src="product_images/'.$product_image.'" /></div>
						<div class="col-md-3">'.$product_title.'</div>
						<div class="col-md-3">'.CURRENCY.' '.$product_price.'</div>
					</div>';
				
			}
			?>
				<a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}
	if (isset($_POST["checkOutDetails"])) {
		
	
		if (mysqli_num_rows($query) > 0) {
			
			//display user cart item with "Ready to checkout" button if user is not login
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$product_desc = $row["product_desc"];
					$product_qty = $row["product_qty"];
					$product_price = $row["product_price"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];
					
					echo 
						'<br>
						
						<div class="row">
								<div class="container">
								<div class="col-md-8 "><hr style="border:none; height:2px; background:black;></div>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<br>
								<div class="col-md-2"><img class="img-responsive" src="product_images/'.$product_image.'">'.$product_title.'</div>
								<div class="col-md-3 text-left">'.$product_desc.'</div>
								<div class="col-md-2"><input type="number" min="1" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-3"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
								<input type="hidden" class="form-control price" value="'.$product_price.'" readonly="readonly">
								<div class="col-md">
									<div class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$product_id.'" class="btn btn-primary update" style="margin-left:5px;"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								</div>';
				}
				
				echo '<div class="row">
							<div class="col-md-6"></div>
							<div class="col-md-3">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
					?>
					<div class="col md-2"><?php
				if (!isset($_SESSION["uid"])) {
					echo '<div class="row">
					<div class="col-md-7"></div>
					<div class="col-md-4"> 	<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Ready to Checkout" >
					</div>
					</div></div></form>';
					?></div>
					<?php
				}else if(isset($_SESSION["uid"])){
			
					echo '</form><form action="payment_option.php" method="POST">
					<div class="col-md-12">';
					$x=0;
					$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo'
					<input type="hidden" name="user" value="'.$_SESSION['uid'].'">
					<input type="hidden" name="pro_id" value="'.$x.'">
					<input type="hidden" name="pro_title" value="'.$product_title.'">
					<input type="hidden" name="pro_qty" value="'.$product_qty.'">
					<input type="hidden" name="pro_desc" value="'.$product_desc.'">
					<input type="hidden" name="pro_price" value="'.$product_price.'">';
							}
echo'<div class="row">
<div class="col-md-6"></div>
<div class="col-md-3">
					<button type="submit" class="btn btn-primary"style=" font-size:30px;">Place Order</button>
					</div>
					</div></div></form>
					';
					
								
				}
			}
	}
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}

if(isset($_POST['cancel'])){
	$canceled = $_POST['canceled'];
	$trx = $_POST['trx1'];
	mysqli_query($con,"UPDATE processing set shipping ='$canceled' where order_id='$trx'");
	mysqli_query($con,"UPDATE orders set shipping ='$canceled' where order_id='$trx'");
header('location:customer_order.php');
}
if(isset($_POST['receive'])){
	$trx_id = $_POST['trx_id'];
	$canceled = $_POST['canceled'];
	$canceled = "Order Received...";
	$canceled1 = "Purchased Has Been deliver successfully";
	$success = "";

	$order_id = $_POST["order_id"];
	$user_id = $_POST["user_id"];
	$product_price = $_POST["product_price"]; 
	$product_id = $_POST["product_id"];
	$qty = $_POST["qty"];
	$total = $product_price * $qty;
	$trx_id = $_POST["trx_id"];
	$shipped = "Purchased Has Been deliver successfully";
	$cancel = $_POST['cancel'];
	$receive = "";
	$product_title = $_POST["product_title"];
	$desc = $_POST["product_desc"];
	$email = $_POST["email"];

	 

	mysqli_query($con,"UPDATE orders set shipping ='$canceled' where order_id='$order_id'");
	mysqli_query($con,"UPDATE delivered set shipping ='$canceled1' where order_id='$order_id'");
	mysqli_query($con,"UPDATE delivered set receive ='$success' where order_id='$order_id'");
	mysqli_query($con, "DELETE FROM orders WHERE order_id='$order_id'");
	mysqli_query($con,"DELETE FROM delivered WHERE order_id='$order_id'");
	$sql1 = "INSERT INTO history (order_id,user_id,product_id,qty,trx_id,p_status,price,payment_method,shipping,cancel,receive,email) VALUES ('".$order_id."','".$user_id."','".$product_id."','$qty','$trx_id','$shipped','$total','','$shipped','$cancel','$receive','$email')";
	mysqli_query($con,$sql1);
	
	header('location:history.php');
	
	
}


?>






