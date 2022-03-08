<?php
include '../db.php';
 if(isset($_POST['submit'])){
    $del = $_POST['del'];
    mysqli_query($con, "DELETE FROM cart WHERE p_id=$del");
 
}     
 ?>