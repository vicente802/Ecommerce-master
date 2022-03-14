<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from cashier where userid='$id'");
	
	?>
		<script>
			window.alert('Deleted successfully!');
			window.location = 'cashier_users.php';
		</script>
	<?php
?>