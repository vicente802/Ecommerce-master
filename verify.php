<?php
session_start();

include 'db.php';

    if(empty($_POST['verification'])){
        echo"ERROR";
    }
else if($_POST['verification'] == $_POST['code']){
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$address1 = $_POST['address1'];
$street = $_POST['street'];
$address2 = $_POST['address2'];
$unit = $_POST['unit'];

	$password = md5($password);
		$sql = "INSERT INTO `user_info` 
		(`user_id`, `first_name`, `last_name`, `email`, 
		`password`, `mobile`, `address1`,`street`, `address2`,`unit`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
		'$password', '$mobile', '$address1', '$street', '$address2', '$unit')";
		$run_query = mysqli_query($con,$sql);
		$_SESSION["uid"] = mysqli_insert_id($con);
		$ip_add = getenv("REMOTE_ADDR");
		$sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
		if(mysqli_query($con,$sql)){
			header('location:profile.php');
			exit();
		}
        else{
            echo'<script>alert("Verification Code Not matched")</script>';
        }
		if($_POST['verification'] != $_POST['code']){
			echo'<script>alert("Error")	</script>';
			header("location: #");
		}
    }


?>