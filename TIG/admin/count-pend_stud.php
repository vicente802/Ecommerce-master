<?php 

	include("connect.php");

		$sql = "SELECT * FROM user  WHERE position = 'Student' AND status = 'Pending'";
		$result = $conn->query($sql);

		echo $result->num_rows;
		$conn->close();

?>