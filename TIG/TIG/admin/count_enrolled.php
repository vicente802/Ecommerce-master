<?php

	include("connect.php");
	
        $sql2 = "SELECT * FROM enrollment WHERE status = 'Accepted'";
        $result2 = $conn->query($sql2);

        echo $result2->num_rows;
        $conn->close();

?>