<?php
session_start();
include '../db.php';
$user_id = $_SESSION['uid'];

if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_array($result)){
            $ver = $row['verification'];
            
        }
        if($code == $ver){ 
            echo 'success';

        
        }
        else{
            echo 'Error';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
		<title>Hardcore Motorshop</title>
        <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<script src="../js/jquery2.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../main.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Autofocus Field</title>
	<link rel="stylesheet" type="text/css" href="verification.css">

</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-expand-lg navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand" style="margin-left: 5px;color:white;">Hardcore Motorshop</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index2.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
				<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window">&nbsp;</span>Product</a></li>
				<li><a href="services.php"><span class="glyphicon glyphicon-globe">&nbsp;</span>Services</a></li>
				<li><a href="contactus.php"><span class="glyphicon glyphicon-earphone">&nbsp;</span>Contact Us</a></li>
				
			</ul>
</div>
</div>
</div>
</div>

<div>
<div class="container d-flex justify-content-center align-items-center">

<div class="card text-center">

   <div class="card-header p-5">
       <img src="mobile.png">
       <h5 class="mb-2">OTP VERIFICATION</h5>
       <div>
           <small>code has been send to ******1258</small>
       </div>
   </div>

   <div class="input-container d-flex flex-row justify-content-center mt-2">
       <input type="text" class="m-1 text-center form-control rounded" maxlength="1">
       <input type="text" class="m-1 text-center form-control rounded" maxlength="1">
       <input type="text" class="m-1 text-center form-control rounded" maxlength="1">
       <input type="text" class="m-1 text-center form-control rounded" maxlength="1">
       <input type="text" class="m-1 text-center form-control rounded" maxlength="1">
   </div>

<div>
    <small>
        didn't get the otp
       <a href="#" class="text-decoration-none">Resend</a>
    </small>
</div>

<div class="mt-3 mb-5">
    <button class="btn btn-success px-4 verify-btn">verify</button>
</div>

</div>

</div>

</body>
</html>