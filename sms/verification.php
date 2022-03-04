<?php
session_start();
include '../db.php';
$user_id = $_SESSION['uid'];
if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Enter OTP CODE<input type="text" name="code">
        <input type="submit" name="submit">
    </form>
</body>
</html>