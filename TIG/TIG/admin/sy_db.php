<?php
include("connect.php");

 
      if (isset($_POST['submit'])) {

        $sy = $_POST['sy'];
        $sql = "INSERT INTO school_year (sy, status) VALUES('$sy', 'Deactive')";

        mysqli_query($conn, $sql);

            echo '<script>window.location.href="school_year.php";</script>';

      }

      if (isset($_POST['status'])) {

          $id = $_GET['school_yr_id'];

          mysqli_query($conn,"update school_year set status='Inactive' where status='Active' ");  
          mysqli_query($conn,"update school_year set status='Active' where school_yr_id='$id' ");
         

          echo '<script>window.location.href="school_year.php";</script>';

    }
?>
