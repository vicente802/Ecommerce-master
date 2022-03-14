<?php 
//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode){

    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
);

$context  = stream_context_create($param);
return file_get_contents($url, false, $context);}
//################################################################# TR-RUSTY823192_4GIZJ #########


if (isset($_POST['sendSMS'])) {

    $sender = $_POST['sender'];
    $reciever = $_POST['reciever'];
    $msg = $_POST['msg'];
    $api = "ST-JAZNA265168_423YP";
    $text = $sender.":".$msg;

if (!empty($sender && $msg && $reciever)) {

    $result = itexmo($reciever, $text, $api);

    if ($result == ""){
        echo "iTexMo: No response from server!!!
        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
        Please CONTACT US for help. ";  
    }else if ($result == 0){
         echo "<script> alert('Messege Sent Successfully..')</script>";
         echo "<script>window.location = 'students_record.php'</script>";
    }
    else{   
         echo "<script> alert('Error Num ". $result . " was encountered!')</script>";
         echo "<script>window.location = 'students_record.php'</script>";
    }
}

}

?>