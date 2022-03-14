<?php
include('session.php');

if (isset($_POST['limit'])) {

  $id=$_GET['id'];

  $limiter=$_POST['limiter'];

  mysqli_query($conn,"update limit_student set limit_student='$limiter' where id='$id' ");

}
  ?>
    <script>
      window.location = 'monitor_subjects.php';
    </script>
  <?php

?>
