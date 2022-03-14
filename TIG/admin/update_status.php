<?php 

include("connect.php");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
if(isset($_POST['statsBtn'])){

	$id=$_GET['id'];

	$status=$_POST['status'];

	mysqli_query($conn,"update app_for_admission set status='$status' where userid='$id'");

		?>
			<script>
				window.alert('Done!');
				window.history.back();
			</script>
		<?php
	
}	

?>