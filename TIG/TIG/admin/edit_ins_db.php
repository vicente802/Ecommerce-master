<?php
include('connect.php');
session_start();

if(isset($_POST['edit'])){

	$id=$_GET['id'];

	$address=$_POST['address'];
	$fullname=$_POST['fullname'];
	$contact_number=$_POST['contact_number'];

	mysqli_query($conn,"update instructor set fullname='$fullname', contact_number='$contact_number', address='$address' where instructor_id='$id'");

	?>
		<script>
			window.alert('Edit done!');
			window.history.back();
		</script>
	<?php

	
}		
?>
