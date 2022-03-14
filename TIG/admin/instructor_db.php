<?php
include('connect.php');

	$fullname=$_POST['fullname'];
	$contact_number=$_POST['contact_number'];
	$address = $_POST['address'];

  	$sql = "SELECT * FROM instructor WHERE fullname='$fullname'";
  	$res = mysqli_query($conn, $sql);

  	if (mysqli_num_rows($res) > 0) {

       echo "<script> alert('SORRY!! The insctructor is already exists! Please try Again..')</script>";
       echo "<script>window.location = 'instructor_users.php'</script>";

    }else{

    mysqli_query($conn,"insert into instructor (fullname, contact_number, address) values ('$fullname', '$contact_number', '$address')");

    }

	?>
		<script>
			window.alert('Instructor added successfully!');
			window.history.back();
		</script>
	<?php

?>