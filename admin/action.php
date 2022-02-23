<?php
session_start();
include '../db.php';
$status = $_POST['status'];
    $sql = mysqli_query($con, "SELECT*FROM orders where trx_id");
    if($row = mysqli_num_rows($sql)){
mysqli_query($con, "UPDATE orders set p_status='$status' where order_id");
    header('location: customer_orders.php');
    }
?>