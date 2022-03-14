<?php 

  include("connect.php");

  $username = "";
  $fullname = "";
  $contact_number = "";
  $password = "";

  if (isset($_POST['register'])) {

  	$username = $_POST['username'];
  	$fullname = $_POST['fullname'];
  	$contact_number = $_POST['contact_number'];
	  $password=md5($_POST['password']);

    $fileInfo = PATHINFO($_FILES["image"]["name"]);


    if (empty($_FILES["image"]["name"])){
      $location="";
    }
    else{
      if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png" OR
        $fileInfo['extension'] == "PNG" OR $fileInfo['extension'] == "JPG" OR $fileInfo['extension'] == "JPEG" OR $fileInfo['extension'] == "jpeg") {

          $newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
          move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
          $location = "upload/" . $newFilename;
      }else{
        $location="";
        ?>
          <script>
            window.alert('Photo not added. Please upload JPG or PNG photo only!');
          </script>
        <?php
      }
    }

  	$sql = "SELECT * FROM user WHERE username='$username'";
  	$res = mysqli_query($conn, $sql);

  	if (mysqli_num_rows($res) > 0) {
    	 echo "<script> alert('SORRY!! The Username is already exists! Please try Again..')</script>";
       echo "<script>window.location = 'cashier_users.php'</script>";
  	}else{

  		mysqli_query($conn,"insert into user (username, password, position) values ('$username', '$password', 'Cashier')");
  		$userid=mysqli_insert_id($conn);
  		mysqli_query($conn,"insert into cashier (userid, fullname, contact_number, image) values ('$userid','$fullname', '$contact_number', '$location')");

      echo "<script> alert('New Cashier added!')</script>";
  		echo "<script>window.location = 'cashier_users.php'</script>";
  	}
  }
?>