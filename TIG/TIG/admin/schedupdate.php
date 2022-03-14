<?php
include('session.php');

	$id=$_GET['id'];

	$major=$_POST['major'];
	$descriptive_title=$_POST['descriptive_title'];
	$semister=$_POST['semister'];
	$room=$_POST['room'];
	$section=$_POST['section'];
	$sy=$_POST['sy'];
	$timein=$_POST['timein'];
	$timeout=$_POST['timeout'];
	$instructor=$_POST['instructor'];
	

	mysqli_query($conn,"update schedule set program_id='$major', subjects_id='$descriptive_title', semister='$semister', room='$room', section='$section', school_yr_id='$sy', time='$timein', time2='$timeout', instructor_id='$instructor' where schedule_id='$id'");

	?>
		<script>
			window.alert('Schedule updated successfully!');
			 window.location = 'scheduling.php';
		</script>
	<?php

?>
