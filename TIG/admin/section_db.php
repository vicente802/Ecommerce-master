<?php
include('connect.php');

if (isset($_POST['section_btn'])) {

$section = $_POST['section'];
$section_id = $_POST['section_id'];

mysqli_query($conn, "insert into section(section_id, section) values ('$section_id', '$section')");
} 
?>
    <script>
      window.alert('Section added successfully!');
      window.history.back();
    </script>
  <?php
?>
