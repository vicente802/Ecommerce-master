<?php 
include('connect.php');

  $queryear = mysqli_query($conn, "select * from school_year where status = 'Active' ");
  $syRow = mysqli_fetch_array($queryear);


  $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
  $semRow = mysqli_fetch_array($semquer);
  
  $id = $_GET['id'];
  $tetst=mysqli_query($conn,"SELECT COUNT(userid) as stud_total FROM enrolled_subject 
         left join schedule on schedule.schedule_id=enrolled_subject.schedule_id
         left join subject on subject.subjects_id=schedule.subjects
         where userid= '$id' AND subject.sem_id='".$semRow['sem_id']."' AND enrolled_subject.school_yr_id='".$syRow['school_yr_id']."' LIMIT 3 ");
  $testRow = mysqli_fetch_array($tetst);
  $tot = $testRow['stud_total'];
	
if (isset($_POST['add_btn'])) {

			$id = $_GET['id'];

			$schedule = $_POST['schedule'];
			$school_yr_id = $_POST['school_yr_id'];
			$semester = $_POST['semester'];
			$course = $_POST['course'];
			$AY = $_POST['AY'];
			$subject = $_POST['subject'];

			mysqli_query($conn,"insert into count_students (schedule_id, school_yr_id, sem_id, userid) values ('$schedule', '$school_yr_id', '$semester', '$id')");

		?>
			<script>
				
				window.history.back();
			</script>
		<?php
	} 

	?>