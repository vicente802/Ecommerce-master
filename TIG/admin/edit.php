<?php
include('session.php');

	$id=$_GET['id'];

	$username=$_POST['username'];
	$password=$_POST['password'];
	$fullname=$_POST['fullname'];
	$contact_number=$_POST['contact_number'];

	$use=mysqli_query($conn,"select * from admin where userid='id'");
	$urow=mysqli_fetch_array($use);

	if ($password==$urow['password']){
		$password=$password;
	}
	else{
		$password=md5($password);
	}

	mysqli_query($conn,"update user set username='$username', password='$password' where userid='$id'");
	mysqli_query($conn,"update admin set fullname='$fullname', contact_number='$contact_number' where userid='$id'");

	?>
		<script>
			window.alert('Admin updated successfully!');
			window.history.back();
		</script>
	<?php

?>