<?php
include('session.php');

	$id=$_GET['id'];

	$course_no=$_POST['course_no'];
	$descriptive_title=$_POST['descriptive_title'];
	$units_lec=$_POST['unit_lec'];
	$units_lab=$_POST['unit_lab'];
	$hours=$_POST['hours'];
	

	mysqli_query($conn,"update subject set course_no='$course_no', descriptive_title='$descriptive_title', units_lec='$units_lec', units_lab='$units_lab', hours='$hours' where subjects_id='$id'");

	?>
		<script>
			window.alert('Subject updated successfully!');
			 window.location = 'list-subjects.php';
		</script>
	<?php

?>
