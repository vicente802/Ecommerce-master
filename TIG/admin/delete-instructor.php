<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from instructor where instructor_id='$id'");
	
	?>
		<script>
			window.alert('Deleted successfully!');
			window.location = 'instructor_users.php';
		</script>
	<?php
?>