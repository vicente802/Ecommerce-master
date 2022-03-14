<?php

$conn = mysqli_connect("localhost","root","","tigdatabase");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>