<?php 
include("connect.php");

$id=$_GET['school_yr_id'];
		$sql = "SELECT * FROM school_year WHERE status='Active' ";  
		$res = mysqli_query($connect, $sql);

    if (mysqli_num_rows($res) > 0) {

  		$id=$_GET['school_yr_id'];
        $status = $_POST['status'];

        mysqli_query($connect,"update school_year set status='Inactive' where school_yr_id='$id'");

            echo '<script>window.location.href="school_year.php";</script>';


    }else{

  		$id=$_GET['school_yr_id'];
        $status = $_POST['status'];
        mysqli_query($connect,"update school_year set status='Active' where school_yr_id='$id'");

            echo '<script>window.location.href="school_year.php";</script>';
        }

?>