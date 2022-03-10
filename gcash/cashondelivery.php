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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<script src="../js/jquery2.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../main.js"></script>
	<title>Hardcore Motorshop</title>
</head>
<body>
	
<?php
echo'';
}
?>
</body>
</html>