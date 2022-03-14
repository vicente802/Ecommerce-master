<?php 

include("connect.php");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
if(isset($_POST['status'])){

	$id=$_GET['id'];

	$status=$_POST['status1'];

	mysqli_query($conn,"update enrollment set status='$status' where student_id='$id'");

		?>
			<script>
				window.alert('Done!');
				window.history.back();
			</script>
		<?php
	
}	

?>