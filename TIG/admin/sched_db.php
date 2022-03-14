<?php
include('connect.php');

	$instructor_id=$_POST['instructor_id'];
	$section=$_POST['section'];
	$day=$_POST['day'];
	$time=$_POST['time'];
	$time2=$_POST['time2'];
	$room=$_POST['room'];
	$school_yr_id=$_POST['school_yr_id'];
	$subjects_id=$_POST['subjects_id'];
	$program_id=$_POST['program_id'];

	mysqli_query($conn,"insert into schedule (section, subjects_id, instructor_id, program_id, day, time, time2, room, school_yr_id) values ('$section','$subjects_id', '$instructor_id', '$program_id', '$day', '$time', '$time2', '$room', '$school_yr_id')");

	?>
		<script>
			window.alert('Schedule added successfully!');
			 window.location = 'scheduling.php';
		</script>
	<?php

?>	
