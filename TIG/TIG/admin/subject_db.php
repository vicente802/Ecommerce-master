<?php
include('connect.php');

	$course_no=$_POST['course_no'];
	$descriptive_title=$_POST['descriptive_title'];
	$unit_lec=$_POST['unit_lec'];
	$unit_lab=$_POST['unit_lab'];
	$hours=$_POST['hours'];
	$major01=$_POST['major'];
	$course=$_POST['course'];
	$semester=$_POST['semester'];
	$school_year=$_POST['school_year'];

		mysqli_query($conn,"insert into subject (course, course_no, descriptive_title, program_id, units_lec, units_lab, hours, sem_id, school_yr_id) values ('$course', '$course_no', '$descriptive_title', '$major01', '$unit_lec', '$unit_lab', '$hours', '$semester', '$school_year')");

		echo "<script> alert('New subject added!')</script>";
  		echo "<script>window.location = 'list-subjects.php'</script>";

?>
