<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from schedule where schedule_id='$id'");
	
	?>
		<script>
			window.alert('Schedule deleted successfully!');
			window.location = 'scheduling.php';
		</script>
	<?php
?>