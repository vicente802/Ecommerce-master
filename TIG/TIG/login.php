<?php
include('connect.php');
session_start();
if(isset($_POST['emailSend']) && isset($_POST['passSend'])){
	$email = $_POST['emailSend'];
	$pass = $_POST['passSend'];
	$pass = md5($_POST['passSend']);
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$email' and password='$pass'");
	$row = $result->fetch_array();
 $id = $_SESSION['userid']= $row['userid'] ;

}
else{
	echo "no data";
}
?>