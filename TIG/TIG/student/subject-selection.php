	<?php 
	include('connect.php');
	session_start();

	if (isset($_POST['insertion'])) {
	

		if (empty($_POST['schedule'])) {

			echo '<script>alert("Please select subject!")</script>';
        	echo '<script>window.location.href="enrollment.php";</script>';

		}

		else {

			$school_yr_id = $_POST['school_yr_id'];
			$semester = $_POST['semester'];
			$course = $_POST['course'];
			$AY = $_POST['AY'];
			$major = $_POST['major'];

			$userid=mysqli_insert_id($conn);
			$numbersOfSelected = count($_POST['schedule']);
			$id=mysqli_insert_id($conn);
			$i = 0;
		
		while ($i < $numbersOfSelected) { 
			
			$keyToInsert = $_POST['schedule'][$i];
		
			mysqli_query($conn,"insert into enrolled_subject (id, schedule_id, school_yr_id, sem_id, userid) values ('$id', '$keyToInsert', '$school_yr_id', '$semester', '".$_SESSION['id']."')");

			$i++;
			
		}

			$sql2 = mysqli_query($conn, "insert into enrollment (AY, student_id, program_id, major_id, date_registered, sem_id, status) values ('$school_yr_id','".$_SESSION['id']."', '$course', '$major', '".date('Y-m-d H:i:s')."', '$semester', 'Pending' )");

		        echo '<script>alert("Subject successfully added!")</script>';
        		echo '<script>window.location.href="enrolled_subject.php";</script>';
	} 




}

	?>

	
	