<?php
session_status();

include '../db.php';

$user_id = $_POST['user_id'];
$p_id = $_POST['p_id'];
$product_title = $_POST['product_title'];
$product_desc = $_POST['product_desc'];
$p_status = $_POST['p_status'];
$payment_method = $_POST['payment_method'];
$shipping = $_POST['shipping'];
$cancel = $_POST['cancel'];
$ran = $_POST['ran'];
$qty = $_POST['qty'];
$total = $_POST['total'];
$res = mysqli_query($con, "SELECT * FROM cart WHERE user_id=$user_id");

if(isset($_POST['submit'])){
	if(mysqli_num_rows($res)){
		while($row = mysqli_fetch_array($res)){
mysqli_query($con, "INSERT INTO  orders(user_id,product_id,qty,trx_id,p_status,price,payment_method,shipping,cancel)
values('".$row['user_id']."','".$row['p_id']."','$qty','$ran','$p_status','$total','$payment_method','$shipping','$cancel')");
mysqli_query($con, "DELETE FROM cart WHERE user_id=$user_id");

}
}
echo'success';
}
?>
