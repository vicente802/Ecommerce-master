<?php
include('session.php');

	$id=$_GET['id'];

  $course=$_POST['course'];
  $course_num=$_POST['course_num'];
  $major=$_POST['major'];
  $subject=$_POST['subject'];
  $semester=$_POST['semester'];
  $sy=$_POST['sy'];
  $instructor=$_POST['instructor'];
  $timein=$_POST['timein'];
  $timeout=$_POST['timeout'];
  $room=$_POST['room'];
	

	mysqli_query($conn,"update schedule set programs='$course', course_num='$course_num', major_id='$major', subjects='$subject', sem_id='$semester', school_yr_id='$sy', instructor_id='$instructor', time_in='$timein', time_out='$timeout', room='$room' where schedule_id='$id'");

	?>
		<script>
			window.alert('Schedule updated successfully!');
			window.location = 'scheduling.php';
		</script>
	<?php

?>
