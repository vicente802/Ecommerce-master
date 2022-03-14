<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from subject where subjects_id='$id'");
	
	?>
		<script>
			window.alert('Subject deleted successfully!');
			window.location = 'list-subjects.php';
		</script>
	<?php
?>