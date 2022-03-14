<?php 
include 'connect.php';

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
if(isset($_POST['payBtn'])){

	$id=$_GET['id'];

	$balance=$_POST['balance'];
	$payment=$_POST['payment'];
	$fee=$_POST['fee'];
  $sem=$_POST['sem'];
  $yr=$_POST['yr'];

	$date = time();

	$due = $balance-$payment;
  

    
  $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
  $semRow = mysqli_fetch_array($semquer);

  $query=mysqli_query($conn,"select * from students_account where userid='$id' AND students_account.school_year='".$syRow['school_yr_id']."' AND students_account.semester='".$semRow['sem_id']."'  ");
  $row=mysqli_fetch_array($query);

  if ($payment>$balance) {

      ?>
        <script>
          window.alert('Payment is in excess of balance!');
          window.history.back();
        </script>
      <?php

  }

  else if ($row['balance'] == $row['fee']) {
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

      $sender = $_POST['sender'];
      $reciever = $_POST['reciever'];
      $msg = $_POST['msg'];
      $api = "ST-EDMAR265168_C9VK5 ";
      $text = $sender.",\n".$msg;

  if (!empty($sender && $msg && $reciever)) {

      $result = itexmo($reciever, $text, $api);

      if ($result == ""){
          echo "iTexMo: No response from server!!!
          Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
          Please CONTACT US for help. ";  
      }else if ($result == 0){
           echo "<script> alert('Payment successful!')</script>";
           echo "<script>window.location = 'students_record.php'</script>";
      }
      else{   
           echo "<script> alert('Error Num ". $result . " was encountered!')</script>";
           echo "<script>window.location = 'students_record.php'</script>";
      }
  }

  		mysqli_query($conn,"update students_account set balance='$due' where userid='$id'");
  		mysqli_query($conn,"insert into payment_history (userid, my_balance, date_of_payment, payment, sem, school_yr) values ('$id', '$due', '".date('D, m/d/Y', $date)."', '$payment', '$sem', '$yr')");
  		mysqli_query($conn,"update enrollment set status='Enrolled' where student_id='$id'");

      ?>
        <script>
          window.alert('Payment successful!');
          window.history.back();
        </script>
      <?php

  }
  else{ ?>
    <?php 
          mysqli_query($conn,"update students_account set balance='$due' where userid='$id'");
          mysqli_query($conn,"insert into payment_history (userid, my_balance, date_of_payment, payment, sem, school_yr) values ('$id', '$due', '".date('D, m/d/Y', $date)."', '$payment', '$sem', '$yr')");
    ?>
        <script>

          window.alert('Payment successful!');
          window.history.back();
        </script>
      <?php
  }
  }	

?>