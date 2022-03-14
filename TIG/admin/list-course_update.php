<?php
include('session.php');

	$id=$_GET['id'];

	$program_id=$_POST['program_id'];
	$program=$_POST['program'];
	$accreditation_level=$_POST['accreditation_level'];
	$BOT_resolution=$_POST['BOT_resolution'];

	mysqli_query($conn,"update courses set program='$program', accreditation_level='$accreditation_level', BOT_resolution='$BOT_resolution' where program_id='$id'");

	?>
		<script>
			window.alert('Course updated successfully!');
			window.location = 'list-course.php';
		</script>
	<?php

?>