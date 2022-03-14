<?php
	session_start();

	if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')) {
	header('location:../index.php');
    exit();
	}

	include('connect.php');

	$sq=mysqli_query($conn,"SELECT * from admin where userid='".$_SESSION['userid']."'");
	$srow=mysqli_fetch_array($sq);

	$fullname=$srow['fullname'];
	$image=$srow['image'];

	$sq1=mysqli_query($conn,"SELECT * from student_info where id='".$_SESSION['userid']."'");
	$srow1=mysqli_fetch_array($sq1);

	$student_id=$srow1['student_id'];
	$degree_or_course=$srow1['degree_or_course'];
?>
