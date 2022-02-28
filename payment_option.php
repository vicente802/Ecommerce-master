<?php 
session_start();
include 'db.php';

$combine = "SELECT p.product_id,p.product_title,p.product_qty,p.product_desc,p.product_price,c.p_id,c.user_id,c.qty FROM products p join cart c on p.product_id=c.p_id";
$result = mysqli_query($con,$combine);
if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_array($result)){
        $title =  $row['product_title'];
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
    
<br>
<br>
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
        <form action="Customers.php" method="POST">
          <div class="row">
          <div class="col-12">
              <div class="form-group">
                <label>Product Name</label>
                <br>
                <h4><?php echo $title ?></h4>
                <hr>
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
            <div class="col-md-12">
              <div class="form-group">
             <table>
                 <tr>
                     <td style=" padding-right: 80px;">Quantity</td>
                     <td>Price</td>
                 </tr>
                 <tr>
                     <td><h4><?php echo $pro_qty ?></h4></td>
                     <td><h4><?php echo $pro_price ?></h4></td>
                 </tr>
             </table>
              </div>
            </div>
           
              <div class="col-12">
              <div class="form-group">
                  
                <label>Payment Method</label>
                <br>
                <select name="payment_option" style="width:470px; height:40px; font-size:20px;">
                  <option value="">Status</option>
                  <option name="gcash" value="Gcash" >Gcash</option>
                  <option name="paymaya" value="Paymaya" >Paymaya</option>
                  <option name="paypal" value="Paypal" >Paypal</option>
                  <option value="cod" >Cash On Delivery</option>
                </select>
              </div>
            </div>
            

            <div class="col-md-12" style="text-align:right;">
              <button type="submit" name="submit" class="btn btn-primary submit-edit-product">Checkout</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
          
</body>
</html>
