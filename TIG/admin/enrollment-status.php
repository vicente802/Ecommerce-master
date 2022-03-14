<?php 
session_start();
include("connect.php");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['statusBtn'])){

	$id = $_GET['id'];
	$status=$_POST['status'];
	$course=$_POST['course'];
	$major=$_POST['major'];
	$semester=$_POST['semester'];
	$school_year=$_POST['school_year'];
	$balance=$_POST['balance'];
	$sex=$_POST['sex'];
	$day=$_POST['day'];

  	$query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
  	$syRow = mysqli_fetch_array($query);
    
  	$semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
  	$semRow = mysqli_fetch_array($semquer);

	mysqli_query($conn,"update enrollment set status='$status' where student_id = '$id'");
	$userid=mysqli_insert_id($conn);

	mysqli_query($conn,"insert into students_account (userid, student_course, student_major, semester, school_year, fee, balance, sex, day) values ('$id', '$course', '$major', '$semester', '$school_year', '$balance', '$balance', '$sex' ,'$day')");

	$query0=mysqli_query($conn,"SELECT  sum(payment) as tot_paid from payment_history where userid='$id' AND payment_history.school_yr='".$syRow['school_yr_id']."' AND payment_history.sem='".$semRow['sem_id']."'  ");
	$row=mysqli_fetch_array($query0);

	$paid = $row['tot_paid'];

	$com = $balance - $paid;

	mysqli_query($conn,"update students_account set balance='$com' where userid = '$id'");	
	
	if (isset($row['tot_paid'])) {
		mysqli_query($conn,"update enrollment set status='Enrolled' where student_id='$id'");
		mysqli_query($conn,"delete from count_students where userid='$id'");
	}

	$subject = count($_POST['subject']);
	$schedule_id = count($_POST['schedule_id']);

	$i = 0;

	while ($i<$subject AND $i<$schedule_id) { 

		$subjectsToInsert = $_POST['subject'][$i];	
		$roomToInsert = $_POST['schedule_id'][$i];

		mysqli_query($conn,"insert into count_students (userid, subject_title, school_yr_id, sem_id, schedule_id) values ('$id', '$subjectsToInsert', '$school_year', '$semester', '$roomToInsert') ");
		mysqli_query($conn,"delete from enrolled_subject where userid='$id'");
		$i++;

	}

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
         echo "<script> alert('Student Accepted!')</script>";
         echo "<script>window.location = 'pending-enrollment.php'</script>";
    }
    else{   
         echo "<script> alert('Error Num ". $result . " was encountered!')</script>";
         echo "<script>window.location = 'pending-enrollment.php'</script>";
    }
}

		?>
			<script>
				window.alert('Student Accepted!');
				window.location = 'pending-enrollment.php';
			</script>
		<?php
	
}	


?>