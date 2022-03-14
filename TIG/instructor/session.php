<?php
	session_start();

	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../index.php');
    exit();
	}

	include('connect.php');

	$sq=mysqli_query($conn,"select * from student where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);

	$fullname=$srow['fullname'];
	$image=$srow['image'];

	$sq1=mysqli_query($conn,"select student_id from app_for_admission where userid='".$_SESSION['id']."'");
	$srow1=mysqli_fetch_array($sq1);

	$student_id=$srow1['student_id'];
?>
