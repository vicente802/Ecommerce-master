<?php
session_start();
include 'db.php';
include 'sms/sms.php';

if(isset($_SESSION['uid'])){
$random = rand();
mysqli_query($con,"UPDATE user_info SET verification='$random' WHERE user_id='$_SESSION'[uid']'");
}
    $receive = $_POST['number'];
    $message = "";
    $smsapicode = "TR-HARDC016566_XSHU1";
    $passcode ="g!{#2!6%t5";
        $send = new ItextMoController();
        $send->itexmo($receive,$message,$smsapicode,$passcode);
if($send==false){
    header('location:../gcash.php?error=itexmo:no response from server');
}
else if($send == true){
    

}
else{
    header('location: ../index.php?error=something went wrong');
}

?>