<?php
$payment_option = $_POST['payment_option'];
$user_id = $_POST['user'];
$product_id = $_POST['p_id'];
$product_title = $_POST['product_title'];
$total_price= $_POST['total_price'];
$qty = $_POST['qty'];
$product_id = $_POST['p_id'];
$total = $_POST['total'];

if(isset($_POST['submit'])){
    if($payment_option =="Paypal")
    {
       header('location:paypal/paypal.php');
    }
    if($payment_option =="Gcash"){
$user_id = $_SESSION['user'];
$product_id = $_SESSION['p_id'];
$product_title = $_SESSION['product_title'];
$total_price= $_SESSION['total_price'];
$qty = $_SESSION['qty'];
$product_id = $_SESSION['p_id'];
$total = $_SESSION['total'];
        header('location:gcash.php');

    }
}
?>