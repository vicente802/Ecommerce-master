<?php 

include("connect.php");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
if(isset($_POST['aksep_btn'])){

	$id=$_GET['id'];

	mysqli_query($conn,"update user set status='Accepted' where userid='$id'");

		?>
			<script>
				window.alert('Done!');
				window.history.back();
			</script>
		<?php
	
}	

?>