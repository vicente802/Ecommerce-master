<?php 

  $db = mysqli_connect('localhost', 'root', '', 'tigdatabase');

  $username = "";
  $fullname = "";
  $contact_number = "";
  $password = "";

  if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $contact_number = $_POST['contact_number'];
    $password=md5($_POST['password']);
    
  	$sql = "SELECT * FROM user WHERE username='$username'";
  	$res = mysqli_query($db, $sql);

  	if (mysqli_num_rows($res) > 0) {

        echo "<script> alert('Sorry, this username is already taken! Please try again...')</script>";
        echo "<script>window.location = 'index.php'</script>";

  	}else{

            mysqli_query($db,"INSERT into user (username, password, position, status) values ('$username', '$password', 'Student', 'Pending')");

            $userid=mysqli_insert_id($db);

            mysqli_query($db,"INSERT into student (userid, fullname, contact_number) values ('$userid','$fullname', '$contact_number')");

            
    ?>
      <script>
        window.alert('Thank you for signing up. Please wait for the admins approval. Thank you! ☻');
        window.history.back();
      </script>
    <?php

            
    }
  }

?>