<?php
$payment_option = $_POST['payment_option'];
if(isset($_POST['submit'])){
    if($payment_option =="Paypal")
    {
       header('location:paypal/paypal.php');
    }
    if($payment_option =="Gcash"){
        header('location:gcash.php');
    }
}
?>