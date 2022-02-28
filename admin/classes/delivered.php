<?php
session_start();
include '../db.php';

echo '<input type="text" name="email" value="'.$_SESSION['email'].'">';
echo '<input type="text"  name="product_id" value="'.$_SESSION['product_id'].'">';
echo '<input type="text"  name="trx"value="'.$_SESSION['trx'].'">';
echo '<input type="text"  name="p_status"value="'.$_SESSION['p_status'].'">';
echo '<input type="text"  name="shipping"value="'.$_SESSION['shipping'].'">';
echo '<input type="text" name="payment_method" value="'.$_SESSION['payment_method'].'">';
echo '<input type="text" name="order" value="'.$_SESSION['order'].'">';
echo '<input type="text"  name="price" value="'.$_SESSION['price'].'">';
echo '<input type="text"  name="qty1" value="'.$_SESSION['qty1'].'">';
echo '<input type="text"  name="user_id" value="'.$_SESSION['user_id'].'">';

$email = $_SESSION['email'] ;
$product_id = $_SESSION['product_id'];
$trx = $_SESSION['trx'];
$p_status = $_SESSION['p_status'];
$shipping = $_SESSION['shipping']="Delivered..";
$payment_method = $_SESSION['payment_method'];
$order = $_SESSION['order'];
$total = $_SESSION['price'];
$qty = $_SESSION['qty1'];
$user_id =  $_SESSION['user_id'];
$sql1 = "INSERT INTO delivered (order_id,user_id,email,product_id,qty,trx_id,p_status,shipping,cancel,payment_method) VALUES ('$order','$user_id','$email','".$product_id."','".$qty."','$trx','$p_status','$shipping','$cancel','$payment_method')";
				mysqli_query($con,$sql1);
                $receive="Order Received";
				mysqli_query($con, " UPDATE delivered set receive='$receive' WHERE order_id='$order'");
                mysqli_query($con, " DELETE FROM shipping WHERE order_id='$order'");
                $sql =  "INSERT INTO settled ( `email`, `order`,  `trx`, `p_status`, `shipping`, `payment_method`, `price`,`qty`) VALUES ('$email','$order','$trx','$p_status','$shipping','$payment_method','$total','$qty')";
	if ($con->query($sql) === TRUE) {
	
        header('location:../customer_orders.php');
	  } else {
		echo "Error: " ,$sql;
	  }
	


?>