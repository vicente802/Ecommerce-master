<?php 

	include("connect.php");

		$sql = "SELECT * FROM enrollment  WHERE status = 'Pending'";
		$result = $conn->query($sql);

		echo $result->num_rows;
		$conn->close();

?>