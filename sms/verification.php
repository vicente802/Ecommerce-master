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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Autofocus Field</title>
	<link rel="stylesheet" type="text/css" href="verification.css">
</head>
<body>
	<div class="container">
		<h1>ENTER OTP</h1>
		<div class="userInput">
			<input type="text" id='ist' maxlength="1" onkeyup="clickEvent(this,'sec')">
			<input type="text" id="sec" maxlength="1" onkeyup="clickEvent(this,'third')">
			<input type="text" id="third" maxlength="1" onkeyup="clickEvent(this,'fourth')">
			<input type="text" id="fourth" maxlength="1" onkeyup="clickEvent(this,'fifth')">
			<input type="text" id="fifth" maxlength="1">
		</div>
		<button>CONFIRM</button>
	</div>
</body>
</html>