<?php
$payment_option = $_POST['payment_option'];
if(isset($_POST['submit'])){
    if($payment_option =="Paypal")
    {
       header('location:paypal/paypal.php');
    }
}
?>