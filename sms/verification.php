
<?php
if(!isset($_SESSION['uid'])){
    header('location:../login_form.php');
}
session_start();
include '../db.php';
$reference_number = $_SESSION['reference_number'];
$number = $_SESSION['number'];
$user_id = $_SESSION['uid'];
$sql1 = "SELECT c.p_id,c.user_id,c.qty,p.product_id FROM cart c JOIN products p  on c.p_id=p.product_id WHERE user_id = $user_id";
$result1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)){
    while($row = mysqli_fetch_array($result1)){
        $pro_id = $row['product_id'];
        $qty = $row['qty'];
        
    }
}

if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_array($result)){
            $ver = $row['verification'];
            
        }
        if($code == $ver){ 
            echo 'success';
         mysqli_query($con, "INSERT INTO orders(user_id,product_id,qty,trx_id)values('$user_id','$pro_id','$qty','$reference_number')");
            }
        }
        else{
            echo 'Error';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
		<title>Hardcore Motorshop</title>
        <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<script src="../js/jquery2.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../main.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Autofocus Field</title>
	<link rel="stylesheet" type="text/css" href="verification.css">
<style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

</style>
</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
<div class="navbar navbar-inverse navbar-expand-lg navbar-fixed-top">
		<div class="container-fluid" style="background-color:black;">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
        <a href="#" class="navbar-brand" style="margin-left: 5px;color:white;">Hardcore Motorshop</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="../index2.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
				<li><a href="../profile.php"><span class="glyphicon glyphicon-modal-window">&nbsp;</span>Product</a></li>
				<li><a href="../services.php"><span class="glyphicon glyphicon-globe">&nbsp;</span>Services</a></li>
				<li><a href="../contactus.php"><span class="glyphicon glyphicon-earphone">&nbsp;</span>Contact Us</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="cart.php" id="cart_container" ><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>View Cart<span class="badge"></span></a>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">&nbsp;</span><?php $user=$_SESSION['name'];  echo "".$user; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;">&nbsp;<span class="">View Cart</a></li>
						<li class="divider"></li>
						<li><a href="customer_order.php" style="text-decoration:none; color:blue;"> Orders</a></li>
						<li class="divider"></li>
						<li><a href="manage.php" style="text-decoration:none; color:blue;">Manage</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
    </div>
</div>

<div>
<div class="container d-flex justify-content-center align-items-center" style="margin-left:100px;">
<div class="row">
<div class="col-md-12">    
<div class="card text-center">
<form action="" method="POST">
   <div class="card-header p-5" >
       <img src="../imgs/ot.png"style="width:100px;">
       <h5 class="mb-2">OTP VERIFICATION</h5>
       <div>
           <small>code has been sent successfully <?php echo " ",$number ?></small>
     
       </div>
   </div>

   <div class="input-container d-flex flex-row justify-content-center mt-2">
   <div class="userInput">
			<input type="number" style="text-align:center; width:200px;
            "class="form-control"id='ist' min="1"maxlength="13" name="code" onkeyup="clickEvent(this,'sec')">


<div>
    <small>
        didn't get the OTP
       <a href="smsapi.php" class="text-decoration-none">Resend</a>
    </small>
</div>

<div class="mt-3 mb-5">
    <button type="submit" name="submit" class="btn btn-success px-4 verify-btn">verify</button>
</div>

</div>

</div>
</form>
</body>
</html>