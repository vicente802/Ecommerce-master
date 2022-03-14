<?php 

include('session.php');
	
		$id=$_GET['id'];
		
		mysqli_query($conn,"delete from count_students where enrolled_id='$id'");

	?>
		<script>
			
			window.history.back();
		</script>
	<?php

?>