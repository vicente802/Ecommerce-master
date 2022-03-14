<?php
include('connect.php');


  $major_id=$_POST['major_id'];
  $program=$_POST['program'];
  $major=$_POST['major'];

  mysqli_query($conn,"insert into major (major_id, program_id, major) values ('$major_id', '$program', '$major')");

	?>
		<script>
			window.alert('Major added successfully!');
			window.location = 'list-subjects.php';
		</script>
	<?php
?>  
