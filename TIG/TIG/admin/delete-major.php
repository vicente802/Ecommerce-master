<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from major where major_id='$id'");
	
	?>
		<script>
			window.alert('Major deleted successfully!');
			window.location = 'list-course.php';
		</script>
	<?php
?>