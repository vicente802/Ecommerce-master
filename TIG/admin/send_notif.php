<?php 

//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode){
            $ch = curl_init();
            $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
            curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
            curl_setopt($ch, CURLOPT_POST, 1);
             curl_setopt($ch, CURLOPT_POSTFIELDS, 
                      http_build_query($itexmo));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            return curl_exec ($ch);
            curl_close ($ch);
}
//########################################################## ST-EDMAR265168_C9VK5 ################

if (isset($_POST['sendSMS'])) {

    $sender = $_POST['sender'];
    $reciever = $_POST['reciever'];
    $msg = $_POST['msg'];
    $api = "ST-EDMAR265168_C9VK5 ";
    $text = $sender.":".$msg;

if (!empty($sender && $msg && $reciever)) {

    $result = itexmo($reciever, $text, $api);

    if ($result == ""){
        echo "iTexMo: No response from server!!!
        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
        Please CONTACT US for help. ";  
    }else if ($result == 0){
         echo "<script> alert('Messege Sent Successfully..')</script>";
         echo "<script>window.location = 'pending-enrollment.php'</script>";
    }
    else{   
         echo "<script> alert('Error Num ". $result . " was encountered!')</script>";
         echo "<script>window.location = 'pending-enrollment.php'</script>";
    }
}

}

?>