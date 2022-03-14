<?php 
include('connect.php');

	$id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * from school_year where status = 'Active' ");
    $syRow = mysqli_fetch_array($query);

    $semquer = mysqli_query($conn, "SELECT * from semester where status = 'Active' ");
    $semRow = mysqli_fetch_array($semquer);    

    $subjsql=mysqli_query($conn,"SELECT * from courses left join app_for_admission on courses.program_id=app_for_admission.course left join major on app_for_admission.major=major.major_id where userid='$id' ");
    $courseRow=mysqli_fetch_array($subjsql); 

    $enrolledsql=mysqli_query($conn, "SELECT * from enrollment where student_id='$id'");
    $enrolledRow=mysqli_fetch_array($enrolledsql);

	$sq=mysqli_query($conn,"SELECT * from enrollment where student_id ='$id' ");
	$srow=mysqli_fetch_array($sq);

		$major = $_POST['major'];
		$course = $_POST['course_id'];

		if ($courseRow['major_id'] == $major && $courseRow['program_id'] == $course) {

		$student_id = $_POST['student_id'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$age = $_POST['age'];
		$sex = $_POST['sex'];
		$civil_status = $_POST['civil_status'];
		$religion = $_POST['religion'];
		$date_of_birth = $_POST['date_of_birth'];
		$place_of_birth = $_POST['place_of_birth'];
		$permanent_address = $_POST['permanent_address'];
		$name_of_parent = $_POST['name_of_parent'];
		$parent_occupation = $_POST['parent_occupation'];
		$parent_contact_no = $_POST['parent_contact_no'];
		$name_of_guardian = $_POST['name_of_guardian'];
		$guardian_occupation = $_POST['guardian_occupation'];
		$guardian_contact_no = $_POST['guardian_contact_no'];
		$if_married_spouse_name = $_POST['if_married_spouse_name'];
		$spouse_occupation = $_POST['spouse_occupation'];
		$school_graduated = $_POST['school_graduated'];
		$AY = $_POST['AY'];
		$email_address = $_POST['email_address'];
		$dateapplied = $_POST['dateapplied'];
		$type = $_POST['type'];
		$date = time();
		$id = $_GET['id'];
		$semester = $_POST['semester'];
		$school_year = $_POST['school_year'];

	mysqli_query($conn,"update app_for_admission set student_id='$student_id', lastname='$lastname', firstname='$firstname', middlename='$middlename', age='$age', sex='$sex', civil_status='$civil_status', religion='$religion', date_of_birth='$date_of_birth', place_of_birth='$place_of_birth', permanent_address='$permanent_address', name_of_parent='$name_of_parent', name_of_guardian='$name_of_guardian', parent_occupation='$parent_occupation', parent_contact_no='$parent_contact_no', guardian_occupation='$guardian_occupation', guardian_contact_no='$guardian_contact_no', if_married_spouse_name='$if_married_spouse_name', spouse_occupation='$spouse_occupation', school_graduated='$school_graduated', AY='$AY', email_address='$email_address',dateapplied='$dateapplied', type='$type' where userid='$id'" );

	mysqli_query($conn, "update enrollment set AY='$AY', program_id='$course', date_registered='".date('D, m/d/Y', $date)."', where student_id='$id' ");

    }else {

		$major = $_POST['major'];
		$course = $_POST['course_id'];
		$AY = $_POST['AY'];
		$date = time();
		$semester = $_POST['semester'];
		$school_year = $_POST['school_year'];

		mysqli_query($conn, "delete from enrollment where student_id='$id'");
		//mysqli_query($conn, "delete from students_account where userid='$id'");
		//mysqli_query($conn, "update students_account set student_course='$course', major='$major' where userid='$id'");
		mysqli_query($conn, "delete from enrolled_subject where userid='$id'");

		//mysqli_query($conn, "insert into enrollment (AY, student_id, program_id, major_id, date_registered, sem_id, status) values ('$school_year','$id', '$course', '$major', '".date('Y-m-d H:i:s')."', '$semester', 'Pending' )");

		mysqli_query($conn,"update app_for_admission set course='$course', major='$major' where userid='$id'" );


    }

	?>	
		<script> alert('Updated successfully!!')</script>
      	<script>window.location = 'admission.php'</script> 
<?php ?>