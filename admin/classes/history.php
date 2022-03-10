<?php
session_start();
include '../db.php';

echo '<input type="text" name="email" value="'.$_SESSION['email'].'">';
echo '<input type="text"  name="title"value="'.$_SESSION['title'].'">';
echo '<input type="text"  name="user_id"value="'.$_SESSION['user_id'].'">';
echo '<input type="text"  name="product_id"value="'.$_SESSION['product_id'].'">';
echo '<input type="text"  name="p_status"value="'.$_SESSION['p_status'].'">';
echo '<input type="text"  name="shipping"value="'.$_SESSION['shipping'].'">';
echo '<input type="text" name="payment_method" value="'.$_SESSION['payment_method'].'">';
echo '<input type="text" name="order" value="'.$_SESSION['order'].'">';
echo '<input type="text"  name="price" value="'.$_SESSION['price'].'">';
echo '<input type="text"  name="price" value="'.$_SESSION['qty1'].'">';
$email = $_SESSION['email'] ;
$user_id = $_SESSION['user_id'] ;
$title = $_SESSION['title'];
$product_id = $_SESSION['product_id'];
$trx = $_SESSION['trx'];
$p_status = $_SESSION['p_status'];
$shipping = $_SESSION['shipping'];
$payment_method = $_SESSION['payment_method'];
$status = $_SESSION['status'];
$order = $_SESSION['order'];
$total = $_SESSION['price'];
$qt = $_SESSION['qty1'];
$history= "INSERT INTO history (order_id,user_id,email,product_id,qty,trx_id,p_status,shipping,cancel,payment_method,price) VALUES ('$order','$user_id','$email','".$product_id."','".$qt."','$trx','$p_status','$shipping','$cancel','$payment_method','$total')";
mysqli_query($con,$history);
mysqli_query($con,"DELETE FROM delivered WHERE order_id='$order'");
$sql =  "INSERT INTO settled ( `email`, `order`,  `trx`, `p_status`, `shipping`, `payment_method`, `price`,`qty`) VALUES ('$email','$order','$trx','$p_status','$shipping','$payment_method','$total','$qt')";
if ($con->query($sql) === TRUE) {
    header('location: ../customer_orders.php');
  } else {
    echo "Error: " ,$sql;
  }
?>