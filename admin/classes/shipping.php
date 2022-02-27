<?php
session_start();
include '../db.php';

echo '<input type="text" name="email" value="'.$_SESSION['email'].'">';
echo '<input type="text"  name="price" value="'.$_SESSION['product_id'].'">';
echo '<input type="text"  name="title"value="'.$_SESSION['trx'].'">';
echo '<input type="text"  name="p_status"value="'.$_SESSION['p_status'].'">';
echo '<input type="text"  name="shipping"value="'.$_SESSION['shipping'].'">';
echo '<input type="text" name="payment_method" value="'.$_SESSION['payment_method'].'">';
echo '<input type="text" name="order" value="'.$_SESSION['order'].'">';
echo '<input type="text"  name="price" value="'.$_SESSION['price'].'">';
echo '<input type="text"  name="price" value="'.$_SESSION['qty1'].'">';
$email = $_SESSION['email'] ;
$product_id = $_SESSION['product_id'];
$trx = $_SESSION['trx'];
$p_status = $_SESSION['p_status'];
$shipping = $_SESSION['shipping']="Shipping...";
$payment_method = $_SESSION['payment_method'];
$order = $_SESSION['order'];
$total = $_SESSION['price'];
$qty = $_SESSION['qty1'];
 
$sql1 = "INSERT INTO shipping (email,product_id,qty,trx_id,p_status,shipping,cancel,payment_method) VALUES ('$email','".$product_id."','".$qty."','$trx','$p_status','$shipping','$cancel','$payment_method')";
				mysqli_query($con,$sql1);
                mysqli_query($con, " DELETE FROM preparing WHERE order_id='$order'");
                header('location:../customer_orders.php');

?>