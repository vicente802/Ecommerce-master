<?php
include('session.php');

	$id=$_GET['id'];

	$major_id=$_POST['major_id'];
	$program=$_POST['program'];
	$major=$_POST['major'];

	mysqli_query($conn,"update major set program='$program', major='$major' where major_id='$id'");

	?>
		<script>
			window.alert('Major updated successfully!');
			window.location = 'list-course.php';
		</script>
	<?php

?>