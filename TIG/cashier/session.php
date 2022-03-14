<?php
	session_start();

	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../index.php');
    exit();
	}

	include('connect.php');

	$sq=mysqli_query($conn,"select * from cashier where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);

	$fullname=$srow['fullname'];
	$image=$srow['image'];

?>
