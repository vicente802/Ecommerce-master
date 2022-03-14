<?php 

  $db = mysqli_connect('localhost', 'root', '', 'gs_enrollment_system');

  $username = "";
  $fullname = "";
  $contact_number = "";
  $password = "";

  if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $password=md5($_POST['password']);
    
    $sql = "SELECT * FROM user WHERE username='$username'";
    $res = mysqli_query($db, $sql);

    if (mysqli_num_rows($res) > 0) {

        $name_error = "Sorry... this username is already taken! =(";  

    }else{

            mysqli_query($db,"insert into user (username, password, position) values ('$username', '$password', 'Instructor')");
            $userid=mysqli_insert_id($db);
            mysqli_query($db,"insert into instructor (instructor_id, fullname, contact_number, address, status) values ('$userid','$fullname', '$contact_number', '$address', 'Pending')");

            echo "<script> alert('Thank you for signing up. Please login to continue. Thank you! ☻')</script>";
            //echo "<script>window.location = '../index.php'</script>";
    }


    }

?>