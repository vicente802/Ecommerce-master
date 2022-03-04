<?php
include 'db.php';
$ip_add = getenv("REMOTE_ADDR");
$p_id = $_POST['pro_id'];
$user_id = $_POST['user_id'];
$sql = "INSERT INTO `cart`
(`p_id`, `ip_add`, `user_id`, `qty`) 
VALUES ('$p_id','$ip_add','$user_id','1')";
if (mysqli_query($con,$sql)) {
    echo "
        <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Your product is Added Successfully..!</b>
        </div>
    ";
    exit();
}
?>