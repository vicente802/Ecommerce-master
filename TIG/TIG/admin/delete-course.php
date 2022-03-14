<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from courses where program_id='$id'");
	
	?>
		<script>
			window.alert('Course deleted successfully!');
			window.location = 'list-course.php';
		</script>
	<?php
?>