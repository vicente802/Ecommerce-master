<?php
include('connect.php');

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password=md5($_POST['password']);
	$fullname=$_POST['fullname'];
	$contact_number=$_POST['contact_number'];

	$check_duplicate_username = "SELECT username FROM user WHERE username = '$username' ";
	$result = mysqli_query($conn, $check_duplicate_username);
	$count = mysqli_num_rows($result);

	if($count > 0){
		echo "<script> alert('Username is already taken!')</script>";
		echo "<script>window.location = 'admin_user.php'</script>";
	}
	
	mysqli_query($conn,"insert into user (username, password, position) values ('$username', '$password', 'Admin')");
	$userid=mysqli_insert_id($conn);
	mysqli_query($conn,"insert into admin (userid, fullname, contact_number) values ('$userid','$fullname', '$contact_number')");

	?>
		<script>
			window.alert('Admin added successfully!');
			window.history.back();
		</script>
	<?php

?>