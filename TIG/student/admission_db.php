<?php include('connect.php'); ?>
<?php include('session.php'); ?>

<?php
	if(isset($_POST['save'])){

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
		$email_address = $_POST['email_address'];
		$dateapplied = $_POST['dateapplied'];
		$semester = $_POST['semester'];
		$type = $_POST['type'];

			$sql = mysqli_query($conn, "INSERT into app_for_admission (userid, student_id, lastname, firstname, middlename, age, sex, civil_status, religion, date_of_birth, place_of_birth, permanent_address, name_of_parent, parent_occupation, parent_contact_no, name_of_guardian, guardian_occupation, guardian_contact_no, if_married_spouse_name, spouse_occupation, school_graduated, AY, email_address, dateapplied, sem_id, type) values ('".$_SESSION['id']."', '$student_id', '$lastname', '$firstname', '$middlename', '$age', '$sex ', '$civil_status', '$religion', '$date_of_birth', '$place_of_birth', '$permanent_address', '$name_of_parent', '$parent_occupation', '$parent_contact_no', '$name_of_guardian', '$guardian_occupation', '$guardian_contact_no', '$if_married_spouse_name', '$spouse_occupation','$email_address', '$dateapplied', '$semester', '$type')");

			?>
				<script>
					window.alert('Information saved successfully!');
					window.history.back();
				</script>
			

 <?php } ?>	


