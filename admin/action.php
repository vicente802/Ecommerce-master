<?php
session_start();
include '../db.php';
$status = $_POST['status'];

    mysqli_query($con, "UPDATE orders set p_status ='$status'");
    header('location: customer_orders.php');
?>