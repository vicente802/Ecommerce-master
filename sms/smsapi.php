<?php
session_start();
include '../db.php';
include '../sms/sms.php';
$user_id = $_SESSION['uid'];
$p_status = $_POST['p_status'];
$accname = $_POST['accname'];
$reference_number = $_POST['reference_number'];
$number = $_POST['number'];
$random = rand();
    $receive = $_POST['number'];
    $message = $random;
    $smsapicode = "TR-HARDC016566_XSHU1";
    $passcode ="g!{#2!6%t5";
        $send = new ItextMoController();
        $send->itexmo($receive,$message,$smsapicode,$passcode);
if($send==false){
    header('location:../gcash.php?error=itexmo:no response from server');
}
else if($send == true){
  $_SESSION['reference_number'] =   $reference_number ;
  $_SESSION['number'] = $number ;
mysqli_query($con,"UPDATE user_info SET verification='$random' WHERE user_id='$user_id'");
header('location:verification.php');

}
else if(empty($_POST['accname']) || empty($_POST['reference_number']) || empty($_POST['number'])){
    ?>
    <script type="text/javascript">
    alert("Please Kindly fill up the form");
    location="../gcash.php";
    </script>
    <?php
}
else{
    header('location: ../gcash.php?error=something went wrong');
}

?>