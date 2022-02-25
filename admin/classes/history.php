<?php
session_start();
include '../db.php';

echo '<input type="text" name="email" value="'.$_SESSION['email'].'">';
echo '<input type="text"  name="title"value="'.$_SESSION['title'].'">';
echo '<input type="text"  name="p_status"value="'.$_SESSION['p_status'].'">';
echo '<input type="text"  name="shipping"value="'.$_SESSION['shipping'].'">';
echo '<input type="text" name="payment_method" value="'.$_SESSION['payment_method'].'">';
echo '<input type="text" name="order" value="'.$_SESSION['order'].'">';
echo '<input type="text"  name="price" value="'.$_SESSION['price'].'">';
echo '<input type="text"  name="price" value="'.$_SESSION['qty1'].'">';
$email = $_SESSION['email'] ;
$title = $_SESSION['title'];
$trx = $_SESSION['trx'];
$p_status = $_SESSION['p_status'];
$shipping = $_SESSION['shipping'];
$payment_method = $_SESSION['payment_method'];
$status = $_SESSION['status'];
$order = $_SESSION['order'];
$total = $_SESSION['price'];
$qt = $_SESSION['qty1'];

$sql =  "INSERT INTO settled ( `email`, `order`,  `trx`, `p_status`, `shipping`, `payment_method`, `price`,`qty`) VALUES ('$email','$order','$trx','$p_status','$shipping','$payment_method','$total','$qt')";
if ($con->query($sql) === TRUE) {
    header('location: ../customer_orders.php');
  } else {
    echo "Error: " ,$sql;
  }
?>