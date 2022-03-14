<?php
	include('session.php');
	
	$id=$_GET['id'];

	mysqli_query($conn,"delete from app_for_admission where userid='$id'");
	mysqli_query($conn,"delete from user where userid='$id'");
	mysqli_query($conn,"delete from student where userid='$id'");
	mysqli_query($conn,"delete from count_students where userid='$id'");
	mysqli_query($conn,"delete from enrolled_subject where userid='$id'");
	mysqli_query($conn,"delete from payment_history where userid='$id'");
	mysqli_query($conn,"delete from students_account where userid='$id'");
	mysqli_query($conn,"delete from enrollment where student_id='$id'");
	?>
		<script>
			window.alert('Deleted successfully!');
			window.location = 'students_account_list.php';
		</script>
	<?php
?>