<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from student where userid='$id'");
	mysqli_query($conn,"delete from user where userid='$id'");
	
	?>
		<script>
			window.alert('Deleted successfully!');
			window.location = 'student_user.php';
		</script>
	<?php
?>