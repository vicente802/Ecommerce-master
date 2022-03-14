<?php

include('connect.php');

	$program_id=$_POST['program_id'];
	$program=$_POST['program'];
	$accreditation_level=$_POST['accreditation_level'];
	$BOT_resolution=$_POST['BOT_resolution'];

	mysqli_query($conn,"insert into courses (program_id, program, accreditation_level, BOT_resolution) values ('$program_id', '$program', '$accreditation_level', '$BOT_resolution')");

	?>
		<script>
			window.alert('Course added successfully!');
			window.history.back();
		</script>
	<?php

?>	
