<?php
	include('session.php');

		$id=$_GET['id'];
		
		mysqli_query($conn,"delete from enrolled_subject where id='$id'");

	?>
		<script>
			
			window.history.back();
		</script>
	<?php




?>