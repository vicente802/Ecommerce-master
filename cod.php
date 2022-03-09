      <?php
session_start();
include 'db.php';
$ran = rand(0,10000000000000);
$user_id = $_SESSION['uid'];
if(!isset($_SESSION['uid'])){
    header('location: index.php');
}


$res = mysqli_query($con, "SELECT * FROM cart WHERE user_id=$user_id");

if(isset($_POST['submit'])){
    $user_id = $_POST['user_id'];
$p_id = $_POST['p_id'];
$product_title = $_POST['product_title'];
$product_desc = $_POST['product_desc'];
$p_status = $_POST['p_status'];
$payment_method = $_POST['payment_method'];
$shipping = $_POST['shipping'];
$cancel = $_POST['cancel'];
$ran = $_POST['ran'];
$qty = $_POST['qty'];
$total = $_POST['total'];
	if(mysqli_num_rows($res)){
		while($row = mysqli_fetch_array($res)){
mysqli_query($con, "INSERT INTO  orders(user_id,product_id,qty,trx_id,p_status,price,payment_method,shipping,cancel)
values('".$row['user_id']."','".$row['p_id']."','$qty','$ran','$p_status','$total','$payment_method','$shipping','$cancel')");
mysqli_query($con, "INSERT INTO  processing(user_id,product_id,qty,trx_id,p_status,price,payment_method,shipping,cancel)
values('".$row['user_id']."','".$row['p_id']."','$qty','$ran','$p_status','$total','$payment_method','$shipping','$cancel')");
mysqli_query($con, "DELETE FROM cart WHERE user_id=$user_id");
header('location:profile.php');
}
}
}
?>
      <!DOCTYPE html>

        <html>

        <head>
        <meta charset="UTF-8">
        <title>Hardcore Motorshop</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <script src="js/jquery2.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="main.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
      <style>
          table{
              text-overflow: ellipsis;
    
          }
          .modal{
              margin-top: 120px;
          }
          .modal-body{
         

  

  height: 150px;

  width: 100%;

  border: 1px solid #DDD;

  padding: 10px;


          }
          
        
      </style>
        </head>

        <body>
      
<body style=" background-color: smokewhite;">
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
        <p><br/></p>
        <p><br/></p>
        <p><br/></p>
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="signup_msg">

        </div>
        <div class="col-md-2"></div>
        </div>
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="panel panel-primary">
        <div class="panel-heading">Cash on Delivery Form</div>
        <div class="panel-body">


        <div class="row">
            <div class="col-md-6">
                <label for="f_name">Full Name :</label>
                <h4  style="text-transform:capitalize"><?php
                $sql = mysqli_query($con, "SELECT c.user_id,c.p_id,c.qty,p.product_id,p.product_title,u.first_name,u.last_name,u.email,u.mobile,u.address1,u.address2,u.street FROM cart c join products p on c.p_id=p.product_id JOIN user_info u WHERE u.user_id=$user_id");
if(mysqli_num_rows($sql)){
    while($row=mysqli_fetch_array($sql)){
       $lastname= $row['last_name'];
       $firstname =$row['first_name'];
    }
} echo $lastname,", ",$firstname ?></h4>
            </div>
            <div class="col-md-6">
                <label for="f_name">Reference Number :</label>
                <h4><?php echo $ran ?></h4>
            </div>
        
        <div class="col-md-6">
                <label for="f_name">Email :</label>
                <h4><?php    
$sql = mysqli_query($con, "SELECT c.user_id,c.p_id,c.qty,p.product_id,p.product_title,u.first_name,u.last_name,u.email,u.mobile,u.address1,u.address2,u.street FROM cart c join products p on c.p_id=p.product_id JOIN user_info u WHERE u.user_id=$user_id");
if(mysqli_num_rows($sql)){
    while($row=mysqli_fetch_array($sql)){
       $email= $row['email'];
    
    }
} echo $email ?></h4>
            </div>
            <div class="col-md-6">
                <label for="f_name">Estimated Date :</label>
                <h4><?php echo "1 to 3 days" ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <label for="password">Phone Number :</label>
                <h4><?php $sql = mysqli_query($con, "SELECT c.user_id,c.p_id,c.qty,p.product_id,p.product_title,u.first_name,u.last_name,u.email,u.mobile,u.address1,u.address2,u.street FROM cart c join products p on c.p_id=p.product_id JOIN user_info u WHERE u.user_id=$user_id");
if(mysqli_num_rows($sql)){
    while($row=mysqli_fetch_array($sql)){
       $number= $row['mobile'];
    
    }
} echo $number  ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="repassword">Delivery Address</label>
                <h4 style="text-transform:capitalize"><?php
                $sql = mysqli_query($con, "SELECT c.user_id,c.p_id,c.qty,p.product_id,p.product_title,u.first_name,u.last_name,u.email,u.mobile,u.address1,u.address2,u.street FROM cart c join products p on c.p_id=p.product_id JOIN user_info u WHERE u.user_id=$user_id");
                if(mysqli_num_rows($sql)){
                    while($row=mysqli_fetch_array($sql)){
                       $address1= $row['address1'];
                       $street = $row['street'];
                       $address2= $row['address2'];
                    }
                } 
                echo $street, " ",$address1, " ", $address2  ?></h4>
                
            </div>
        </div>
        
<form action="" method="POST">
        <table class="table table-striped table-hover table-responsive" style="margin-left:50px;  text-align:left; overflow: ellipsis;">
  <thead class=" bg-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  
  </thead>
  <tbody>
  <?php
  $x=1;
$total = 0;
$total1=0;
$p_status ="Pending";
$payment_method = "Cash On Delivery";
$shipping ="Processing";
$cancel = "Cancel";
                $sql = mysqli_query($con, "SELECT c.id,c.user_id,c.p_id,c.qty,p.product_id,p.product_desc,p.product_title,p.product_price,u.first_name,u.last_name,u.email,u.mobile,u.address1,u.address2,u.street FROM cart c join products p on c.p_id=p.product_id JOIN user_info u WHERE u.user_id=$user_id");
                if(mysqli_num_rows($sql)){
                    while($row=mysqli_fetch_array($sql)){
                    $total = $row['qty']*$row['product_price'];
                    $total1= $total1 + $row['qty']*$row['product_price'];
                    $pro_id = $row['p_id'];
                    $user_id = $row['user_id'];
                    $id = $row['id'];
                
                    echo'<tr> 
                    <td>'.$x++.'</td>
                    <td>'.$row['product_title'].'</td>
                    <td >'.$row['product_desc'].'</td>
                    <td>'.$row['qty'].'</td>
                    <td>'.$total.'</td>
             </tr>';

             echo'<tr>
             <td><input type="hidden" name="user_id" value="'.$row['user_id'].'"></td>
             <td><input type="hidden" name="p_id" value="'.$row['p_id'].'"></td>
             <td><input type="hidden" name="product_title" value="'.$row['product_title'].'"></td>
             <td><input type="hidden" name="product_desc" value="'.$row['product_desc'].'"></td>
             <td><input type="hidden" name="p_status" value="'.$p_status.'"></td>
             <td><input type="hidden" name="payment_method" value="'.$payment_method.'"></td>
             <td><input type="hidden" name="shipping" value="'.$shipping.'"></td>
             <td><input type="hidden" name="cancel" value="'.$cancel.'"></td>
             <td><input type="hidden" name="ran" value="'.$ran.'"></td>
             <td><input type="hidden" name="qty" value="'.$row['qty'].'"></td>
             <td><input type="hidden" name="total" value="'.$total.'"></td>
             </tr>
             ';
                      
                }    }
             
                 ?>
                 </tbody>

 
</table>
<h3 style="text-align: right;">Total : <?php echo $total1 ?></h3>
        <div class="row">
            <div class="col-md-12" style="text-align: right;">
            <button  type="button" name="submit" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalLong">Checkout</button>
            <button  type="button" class="btn btn-danger">Cancel</button>
            </div>
        </div>

        </div>
      
        <div class="panel-footer"></div>
        </div>
        </div>
        <div class="col-md-2"></div>
        </div>
        </div>
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong><span style="line-height: 22.5px; font-size: 26px;"><bdt class="block-component"></bdt><bdt class="question">REMINDER</bdt><bdt class="statement-end-if-in-editor"></bdt></span></strong></h5><strong>Last updated <bdt class="block-container question question-in-editor" data-id="e2088df5-25ea-aec9-83d4-6284f5a7e043" data-type="question">March 09, 2022</bdt></strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align:center;">
      <h3>WE ONLY ACCEPT REPLACEMENT</h3>
<h5>A replacement order, with the same shipping speed that was used on your original item, will be created. Use the CONTACT US provided to send your original item back. You'll need to return the original item within 5-7 days to avoid being charged for both the original and replacement items.</h5>
    </div>
      <div class="modal-footer">
      <label style="font-weight:100; float:left; text-align:left; margin-left:0px;" > <input type="checkbox" id="check" onclick="terms_changed(this)">&nbsp;Agree with terms</label>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btn" class="btn btn-primary" disabled  data-dismiss="modal" data-toggle="modal" data-target="#exampleModalLong1">Next</button>
        

        
        <script>
       
       function terms_changed(termsCheckBox){
   
    if(termsCheckBox.checked){
       
        document.getElementById("btn").disabled = false;
    } else{
        
        document.getElementById("btn").disabled = true;
    }
}

        </script>
      </div>
      
    </div>
  </div>
</div>
<div class="modal fade" style="margin-top:100px" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height:300px;">
          <center>
       <img src="imgs/check1.png" style="width:100px; background:white; text-align:center;">
       <h3>Your product has been on processed</h3>
       <div class="modal-footer" style="float:center; text-align:center">
       
        <button type="submit" name="submit" class="btn btn-primary">Continue Shopping</button>
      </div>
       </center>
       </form>
    
      </div>
      
    </div>
  </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </body>

        </html>