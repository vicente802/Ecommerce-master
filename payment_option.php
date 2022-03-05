<?php 
session_start();
include 'db.php';

$combine = "SELECT p.product_id,p.product_title,p.product_qty,p.product_desc,p.product_price,c.p_id,c.user_id,c.qty,u.user_id,u.address1,u.street,u.address2,u.mobile FROM products p join cart c on p.product_id=c.p_id join user_info u on c.user_id=u.user_id WHERE c.user_id='$_SESSION[uid]'";
$result = mysqli_query($con,$combine);
if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_array($result)){
     $title = $row['product_title'];
     $add = $row['address1'];
     $street = $row['street'];
     $add2 = $row['address2'];
     $mobile = $row['mobile'];
    $product_id = $row['p_id'];
    $user = $row['user_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hardcore Motorshop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
    <style>
      .checkout{
        display: none;
      }

.myButton {
	box-shadow:inset 0px 5px 20px -2px #91b8b3;
	background:linear-gradient(to bottom, #768d87 5%, #6c7c7c 100%);
	background-color:#768d87;
	border-radius:5px;
	border:1px solid #566963;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:16px;
	font-weight:bold;
	padding:11px 23px;
	text-decoration:none;
	text-shadow:0px -1px 0px #2b665e;
}
.myButton:hover {
	background:linear-gradient(to bottom, #6c7c7c 5%, #768d87 100%);
	background-color:#6c7c7c;
}
.myButton:active {
	position:relative;
	top:1px;
}

    </style>
</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-expand-lg navbar-fixed-top">
		<div class="container-fluid">	
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
				<li><a href="index2.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
				<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window">&nbsp;</span>Product</a></li>
				<li><a href="services.php"><span class="glyphicon glyphicon-globe">&nbsp;</span>Services</a></li>
				<li><a href="contactus.php"><span class="glyphicon glyphicon-earphone">&nbsp;</span>Contact Us</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="cart.php" id="cart_container" ><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>View Cart<span class="badge"></span></a>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp;<span class="glyphicon glyphicon-user">&nbsp;</span><?php $user=$_SESSION['name'];  echo "".$user; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;">&nbsp;<span class="">Cart</a></li>
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
<br>

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Order Details</h2>
        <a href="cart.php"><button type="button" class="close"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></a>
      </div>
      
      <div class="modal-body">
        <form action="payment_method.php" method="POST">
          <div class="row">
          <div class="col-md-12">
              <div class="form-group">
             <table>
               <tr>
                 <td>Product Name</td>
                 <td style="padding-left:120px;">Quantity</td>
                 <td style="padding-left:20px;">Price</td>
               </tr>
               <tr>
                 <td>
                   <?php
                 $combine = "SELECT p.product_id,p.product_title,p.product_qty,p.product_desc,p.product_price,c.p_id,c.user_id,c.qty,u.user_id,u.address1,u.street,u.address2,u.mobile FROM products p join cart c on p.product_id=c.p_id join user_info u on c.user_id=u.user_id WHERE c.user_id='$_SESSION[uid]'";
                 $result = mysqli_query($con,$combine);
                 if(mysqli_num_rows($result)){
                     while($row = mysqli_fetch_array($result)){
                      echo "<h4>",$row['product_title'],"</h4><hr>";
                      echo'<input type="hidden" name="product_title" value="'.$row['product_title'].'">';
                     
                     }
                 }
                 ?>
                 </td>
                 <td>
                   <?php   

                    $combine = "SELECT p.product_id,p.product_title,p.product_qty,p.product_desc,p.product_price,c.p_id,c.user_id,c.qty,u.user_id,u.address1,u.street,u.address2,u.mobile FROM products p join cart c on p.product_id=c.p_id join user_info u on c.user_id=u.user_id  WHERE c.user_id='$_SESSION[uid]'";
                 $result = mysqli_query($con,$combine);
                 if(mysqli_num_rows($result)){
                     while($row = mysqli_fetch_array($result)){
                      ?><br><?php
                      echo "<h4 style='padding-left:145px;' >",$row['qty'],"<hr></h4>";
                      echo'<input type="hidden" name="qty" value="'.$row['qty'].'">';
                     
                     }
                 } ?>
                 </td>
                 <td>
                   <?php
                   $total_price = 0;
                     $combine = "SELECT p.product_id,p.product_title,p.product_qty,p.product_desc,p.product_price,c.p_id,c.user_id,c.qty,u.user_id,u.address1,u.street,u.address2,u.mobile FROM products p join cart c on p.product_id=c.p_id join user_info u on c.user_id=u.user_id  WHERE c.user_id='$_SESSION[uid]'";
                     $result = mysqli_query($con,$combine);
                     if(mysqli_num_rows($result)){
                         while($row = mysqli_fetch_array($result)){
                          $total_price = $total_price + $row['qty']*$row['product_price'];
                           $total = $row['qty']*$row['product_price'];
                          echo "<br/><h4 style='padding-left:10px;' >".$total."</h4><hr>";
                          echo'<input type="hidden" name="total" value="'.$total.'">';
                       
                          echo'<input type="hidden" name="user" value="'.$row['user_id'].'">';
                          echo'<input type="hidden" name="p_id" value="'.$row['p_id'].'">';
                       
                          

                         }

                     }
                     
                   ?>
                 </td>
               </tr>
             </table>
                
              </div>
            </div>
        
           
         
           

            <div class="col-12">
              <div class="form-group">
                <label>Delivery Address </label>
                <br>
                <h4 style="text-transform:capitalize;"><?php echo $street," " ,$add, " ", $add2 ?></h4>
             
                <hr>
              </div>
            </div>
           
            <div class="col-12">
              <div class="form-group">
                <label>Mobile Number</label>
                <br>
                <h4><?php echo $mobile ?></h4>
                <hr>
              </div>
            </div>
          
           
              <div class="col-12">
              <div class="form-group">
                  
                <label>Payment Method</label>
                <br>
                <select name="payment_option" id="payment_option" onchange="changeStatus()" style="width:470px; height:40px; font-size:20px;">
                  <option value="Status">Status</option>
                  <option name="gcash" value="Gcash" >Gcash</option>
                  <option name="paypal" value="Paypal" >Paypal</option>
                  <option value="cod" >Cash On Delivery</option>
                </select>
              </div>
            </div>
            
              
            <div class="col-md-12" style="text-align:right">
               <?php
                    echo ' Total Price <h4>PHP ',$total_price,'</h4>';
                    echo'<input type="hidden" name="total_price" value="'.$total_price.'">';
                    ?></label>
            
           <table>
             <div class="col-md-10">
             <tr style="text-align:right; float:right; position:relative">
              <td style="position:relative;"><button  type="submit" name="submit" id="gcash"style=" display:none; margin-left:257px; width:190px; backround:transparent; border:none; border-radius:10px; "><img src="imgs/gcash.jpeg" style="border-radius:5px;" width="200" height="50"></button></td>
              <td style="position:relative;"> <button type="submit" name="submit" id="paymaya" class="btn btn-primary " style="display:none;margin-left:370px;">Checkout</button></td>
          
           
              <td style="position:relative;"> <button type="submit" name="submit" id="cashondeliver" class="myButton" style="display:none;margin-left:270px; color:white; width:190px;">Cash On Delivery</button></td>
            
            
              
                    </div> 
            </div>
          </div>
        </form>
        <div id="paypal" style="display:none; position:relative;">
        <?php include 'paypal/paypal.php'; ?>
        </tr>
        </div>
        </table>
        </div>
      </div>
    </div>
  </div>
          <script>
              
           function changeStatus(){
          
             var status = document.getElementById("payment_option");
             
             if(status.value == "Status"){
               document.getElementById("gcash").style.display="none";
               document.getElementById("paypal").style.display="none";
               document.getElementById("paymaya").style.display="none";
               document.getElementById("cashondeliver").style.display="none";
             }
             if(status.value == "Gcash"){
               document.getElementById("gcash").style.display="block";
               document.getElementById("cashondeliver").style.display="none";
               document.getElementById("paypal").style.display="none";
               document.getElementById("paymaya").style.display="none";
             }
             if(status.value == "Paymaya"){
              document.getElementById("gcash").style.display="none";
               document.getElementById("paypal").style.display="none";
               document.getElementById("paymaya").style.display="block";
               document.getElementById("cashondeliver").style.display="none";
             }
             if(status.value == "cod"){
              document.getElementById("gcash").style.display="none";
               document.getElementById("paypal").style.display="none";
               document.getElementById("paymaya").style.display="none";
               document.getElementById("cashondeliver").style.display="block";
              }
             if(status.value == "Paypal"){
              document.getElementById("gcash").style.display="none";
               document.getElementById("paypal").style.display="block";
               document.getElementById("paymaya").style.display="none";
               document.getElementById("cashondeliver").style.display="none";
              }
              
             else{
               
             }
           }
          </script>
</body>
</html>
