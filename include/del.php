<?php
session_start();
include '../db.php';
 if(isset($_POST['submit'])){
    $del = $_POST['del'];
    mysqli_query($con, "DELETE FROM cart WHERE p_id=$del and user_id='".$_SESSION['uid']."'");
    ?>
    <script type="text/javascript">
    alert("Deleted Successfully");
    location="../cod.php";
    </script>
    <?php
}     
 ?>