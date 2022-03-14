<?php 
include("connect.php");


      if (isset($_POST['sem_status'])) {

          $id = $_GET['sem_id'];

          mysqli_query($conn,"update semester set status='Inactive' where status='Active' ");  
          mysqli_query($conn,"update semester set status='Active' where sem_id='$id' ");
         
          echo '<script>window.location.href="school_year.php";</script>';

    }


      if (isset($_POST['stopper'])) {

          $control = $_POST['stopper'];  

          mysqli_query($conn,"update semester set status='$control' where sem_id='4' ");  
         

          echo '<script>window.location.href="school_year.php";</script>';

    }
?>