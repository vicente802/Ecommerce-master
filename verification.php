<?php
session_start();
$code = $_SESSION['email'];
$key = md5(time() .$code);
$to_email = $code;
$subject = "Hardcore Motorshop Verification";
$body = "Copy The Verification Code Here: $key";
$headers = "Verification Code";
?><?php
if (mail($to_email, $subject, $body, $headers)) {
$_SESSION['code'] = $key;
?></div><?php
}else {
echo "Email sending failed...";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		fieldset{
			box-shadow: 2px 3px 350px 71px rgba(148,148,148,1);
-webkit-box-shadow: 2px 3px 350px 71px rgba(148,148,148,1);
-moz-box-shadow: 2px 3px 350px 71px rgba(148,148,148,1);
border-radius: 10px 10px 10px 10px;
		}

	</style>
</head>
<body>
<center>
	<div class="container-fluid" style="position: absolute; z-index:1; margin-top:50px; margin-left:px; ">
	<form action="verify.php" method="POST">
	<fieldset style="background:whitesmoke; z-index:1;  border:1px solid black; float:center; height:510px; width:40%;">
<br>
	<img src="imgs/check.png" width="130px;">
	 <?php echo "<h3>Hello ", $_SESSION['name']," " , $_SESSION['l_name'], " You're almost ready to start enjoying Hardcore Motorshop. 
Simply click the big button below to verify your email address.</h3>"?>

<input type="hidden" name="fname" value="<?php echo $_SESSION['name'] ?>">
<input type="hidden" name="lname" value="<?php echo $_SESSION['l_name'] ?>">
<input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>">
<input type="hidden" name="password" value="<?php echo $_SESSION['password'] ?>">
<input type="hidden" name="repassword" value="<?php echo $_SESSION['repassword'] ?>">
<input type="hidden" name="mobile" value="<?php echo $_SESSION['mobile'] ?>">
<input type="hidden" name="address1" value="<?php echo $_SESSION['address1'] ?>">
<input type="hidden" name="street" value="<?php echo $_SESSION['street'] ?>">
<input type="hidden" name="address2" value="<?php echo $_SESSION['address2'] ?>">
<input type="hidden" name="unit" value="<?php echo $_SESSION['unit'] ?>">
<input type="hidden" name="code" value="<?php echo $key ?>">
<input type="text" style="margin-top: 50px; font-size:35px; height:40px; margin-top:-5px; width:60%; " name="verification">
<br>
<br>
							<input style="width:30%;" type="submit" name="signup" class="btn btn-success btn-lg">
	
						</fieldset>
						</form>
					
</div>
</center>
						</body>
</html>