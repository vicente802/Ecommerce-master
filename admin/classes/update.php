<?php 
session_start();
include '../db.php';
$user_id =  $_SESSION['user_id']=$_POST['user_id'];
$email =  $_SESSION['email']=$_POST['email'];
$title = $_SESSION['product_title']=$_POST['product_title'];
$product_id =$_SESSION['product_id']= $_POST['product_id'];
$trx =$_SESSION['trx']= $_POST['trx'];
$p_status =$_SESSION['p_status']= $_POST['p_status'];
$shipping =$_SESSION['shipping']= $_POST['shipping'];
$payment_method = $_SESSION['payment_method']=$_POST['payment_method'];
$order =$_SESSION['order']= $_POST['order'];
$total = $_SESSION['price']=$_POST['price'];
$qt = $_SESSION['qty1']=$_POST['qty1'];
$sql = mysqli_query($con, "SELECT o.order_id,o.user_id,o.product_id,o.datetime,p.product_title,p.product_id,u.user_id,u.first_name,u.last_name,u.mobile,u.address1,u.street,u.address2 FROM orders o join products p on o.product_id=p.product_id inner join user_info u on o.user_id=u.user_id WHERE o.order_id='$order' ");
				
							if (mysqli_num_rows($sql) > 0) {
								while ($row=mysqli_fetch_array($sql)) {
                                  $title = $row['product_title'];
                                $fname = $row['first_name'];
                                $lname = $row['last_name'];
                                $mobile = $row['mobile'];
                                $address = $row['address1'];
                                $street = $row['street'];
                                $address2 = $row['address2'];
                                $datetime = $row['datetime'];
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
    <title>Document</title>
</head>
<body>
    

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Order Details</h2>
        <a href="../customer_orders.php"><button type="button" class="close"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></a>
      </div>
      
      <div class="modal-body">
        <form action="Customers.php" method="POST">
          <div class="row">
          <div class="col-12">
              <div class="form-group">
                <label>Costumer Name</label>
                <br>
                <h4 style="text-transform:capitalize;"><?php echo $fname," ",$lname  ?></h4>
                <hr>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Delivery Address </label>
                <br>
                <h4 style="text-transform:capitalize;"><?php echo $street ,'<br/ >',"<td style='text-transform:lowercase;'>$address $address2</td>" ; ?></h4>
                <hr>
              </div>
            </div>
           
            <div class="col-12">
              <div class="form-group">
                <label>Product Name</label>
                <br>
                <h4><?php echo $title  ?></h4>
                <hr>
              </div>
            </div>
          
            <div class="col-12">
              <div class="form-group">
                <label>Payment Method</label>
                <br>
                <h4><?php echo $payment_method  ?></h4>
                <hr>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Transaction Number</label>
                <br>
                <h4><?php echo $trx  ?></h4>
                <hr>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Mobile Number</label>
                <br>
                <h4><?php echo $mobile  ?></h4>
                <hr>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
             <table>
                 <tr>
                     <td style=" padding-right: 80px;">Quantity</td>
                     <td>Price</td>
                 </tr>
                 <tr>
                     <td><h4><?php echo $qt?></h4></td>
                     <td><h4><?php echo $total?></h4></td>
                 </tr>
             </table>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Order Date</label>
                <br>
                <h4><?php echo $datetime  ?></h4>
                <hr>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Shipped Date</label>
                <br>
                <h4><?php  ?></h4>
                <hr>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                  
                <label>Shipping</label>
                <br>
                <select name="status" value="status" id="status" style="width:470px; height:40px; font-size:20px;">
                  <option value="Processing...">Status</option>
                  <option name="preparing" value="Preparing" >Preparing</option>
                  <option name="shipping" value="Shipping" >Shipping</option>
                  <option value="Delivered" >Delivered</option>
                  <option value="Settled" >Settled</option>
                  <option name="cancel" value="Cancelled" >Cancel</option>
                </select>
              </div>
            </div>
            <input type="hidden" name="product_title" value='<?php echo $title ?>'>
            <input type="hidden" name="email" value='<?php echo $email ?>'>
            <input type="hidden" name="user_id" value='<?php echo $user_id ?> '>
            <input type="hidden" name="product_id" value='<?php echo $product_id ?>'>
            <input type="hidden" name="order" value=' <?php echo $order ?> '>
            <input type="hidden" name="trx" value=' <?php echo $trx ?> '>
            <input type="hidden" name="p_status" value='<?php echo $p_status ?>'>
            <input type="hidden" name="shipping" value='<?php echo $shipping ?> '>
            <input type="hidden" name="payment_method" value='<?php echo $payment_method ?>'>
            <input type="hidden" name="qty1" value=' <?php echo $qt ?> '>
            <input type="hidden" name="price" value=' <?php echo $total ?>'> 

            <div class="col-md-12" style="text-align:right;">
              <button type="submit" name="submit" class="btn btn-primary submit-edit-product">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
          
</body>
</html>
