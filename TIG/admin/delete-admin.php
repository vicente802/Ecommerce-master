<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from admin where userid='$id'");
	
	?>
		<script>
			window.alert('Deleted successfully!');
			window.location = 'admin_user.php';
		</script>
	<?php
?>