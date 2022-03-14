<?php 
session_start();
include("connect.php");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['enUp'])){

	$id = $_GET['id'];

	$balance=$_POST['balance'];

  	$query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
  	$syRow = mysqli_fetch_array($query);
    
  	$semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
  	$semRow = mysqli_fetch_array($semquer);

	$query0=mysqli_query($conn,"SELECT  sum(payment) as tot_paid from payment_history where userid='$id' AND payment_history.school_yr='".$syRow['school_yr_id']."' AND payment_history.sem='".$semRow['sem_id']."'  ");
	$row=mysqli_fetch_array($query0);

	$paid = $row['tot_paid'];

	$com = $balance - $paid;

	mysqli_query($conn,"update students_account set fee='$balance' where userid = '$id'");	
	mysqli_query($conn,"update students_account set balance='$com' where userid = '$id'");	

	?>
		<script>
			window.alert('Update done!');
			window.history.back();
		</script>
	<?php
}

?>