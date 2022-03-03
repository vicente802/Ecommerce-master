<?php 
session_start();
include 'db.php';
$total_price = 0; 
$combine = "SELECT p.product_id,p.product_title,p.product_qty,p.product_desc,p.product_price,c.p_id,c.user_id,c.qty,u.user_id,u.address1,u.street,u.address2,u.mobile FROM products p join cart c on p.product_id=c.p_id join user_info u on c.user_id=u.user_id WHERE u.user_id=$_SESSION[uid]";
$result = mysqli_query($con,$combine);
if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_array($result)){
     $title = $row['product_title'];
     $add = $row['address1'];
     $street = $row['street'];
     $add2 = $row['address2'];
     $mobile = $row['mobile'];
    
     $total_price= $total_price + $row['qty']*$row['product_price'];
    
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
	
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hardcore Motorshop</title>
    <style>
        body{
            background-image: url('imgs/gcashbackground.jpg');
            width:auto;
            background-repeat: no-repeat;
            height: fit-content;
        }
    .checkout {
        display: none;
    }

    .myButton {
        box-shadow: inset 0px 5px 20px -2px #91b8b3;
        background: linear-gradient(to bottom, #768d87 5%, #6c7c7c 100%);
        background-color: #768d87;
        border-radius: 5px;
        border: 1px solid #566963;
        display: inline-block;
        cursor: pointer;
        color: #ffffff;
        font-family: Arial;
        font-size: 16px;
        font-weight: bold;
        padding: 11px 23px;
        text-decoration: none;
        text-shadow: 0px -1px 0px #2b665e;
    }

    .myButton:hover {
        background: linear-gradient(to bottom, #6c7c7c 5%, #768d87 100%);
        background-color: red;
    }

    .myButton:active {
        position: relative;
        top: 1px;
    }

    .modal-title {
        text-align: center;
        margin-left: 145px;
        color: white;
    }

    .modal-content {
        background-image: url('imgs/gcashback.jpg');
    }

    .close {
        color: white;
        opacity: 1;
    }

    .close:hover {
        color: red;
    }

    label {
        color: white;
        margin-top: 10px;

        font-weight: 400;
    }
    </style>
</head>

<body>
    <br>
    <div class="wait overlay">
	<div class="loader"></div>
</div>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h2 class="modal-title" id="exampleModalLabel" style="text-align: center;">Pay via Gcash</h2>

                <a href="payment_option.php"><button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
            </div>

            <div class="modal-body">
                <form action="gcash/payment_success.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                

                                    <label>Account Name: &nbsp;<input type="text" class="form-control"
                                            style="background:transparent; font-size:20px; line-height:200px; color:white; border:none; font-weight:bold;"
                                            disabled style="font-weight:bold; width:fit-content"
                                            value="Ariel A."></label>
                                    <label>Account Number: &nbsp;<input type="text" class="form-control"
                                            style="background:transparent; font-size:20px;line-height:200px; color:white;  border:none;  font-weight:bold;"
                                            disabled style="font-weight:bold; width:fit-content"
                                            value="09993827634"></label>
                                    <div class="qr" style="text-align: center; margin-top:-180px; margin-left:250px">
                                        <h4 style="color:white; font-weight:bold; font-size:15px;">SCAN TO PAY HERE</h4>
                                        <img src="imgs/qr.jpg" width="150">
                                    </div>
                                    <hr style="background-color:white; width:auto; border:none; height:1px; ">
                                    <center>
                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm">
                                                <h4 style="text-align:center; color:white; margin-left:-30px;">Customer
                                                    Details</h4>

                                            </div>

                                        </div>
                                        <label>Account Name: &nbsp;<input type="text" name="accname" class="form-control"
                                                style="font-weight:bold; width:fit-content" value=""></label>
                                        <label>Account Number: &nbsp;<input type="text" class="form-control"
                                                style="font-weight:bold; width:fit-content"
                                                value="<?php echo $mobile ?>"></label>
                                        <label>Reference Number: &nbsp;<input type="text" name="reference_number"
                                                class="form-control" style="font-weight:bold; width:fit-content"
                                                value=""></label>
                                                <br>
                                                <label>Total Amount: </label><h5 style="color:white;"><?php echo 'PHP ' ,$total_price;?></h5>
                                        <br> <input type="submit" name="submit" class="btn btn-danger" value="Pay Now">
                                        
                                        <?php         
                                      if(isset($_POST['submit'])){
                                          if(empty($_POST['accname'])){
                                              echo'error';
                                          }
                                      }
                                      $p_status = "Pending";
                                    $payment_method = "Gcash";
                                      $shipping = "Processing";
                                      $cancel = "Cancel";
                                      $receive="";
                                      $combine = "SELECT p.product_id,p.product_title,p.product_qty,p.product_desc,p.product_price,c.p_id,c.user_id,c.qty,u.user_id,u.address1,u.street,u.address2,u.mobile FROM products p join cart c on p.product_id=c.p_id join user_info u on c.user_id=u.user_id WHERE u.user_id=$_SESSION[uid]";
                                       $result = mysqli_query($con,$combine);
                        
                                       
                            
                                       $x=0;
                                       $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
                                       $query = mysqli_query($con,$sql);
                                       while($row=mysqli_fetch_array($query)){
                                           $x++;
                                          
                                      
                                           echo  	
                                               '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
                                                  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
                                                <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
                                                <input type="hidden"  name="quantity_'.$x.'" value="'.$row["qty"].'">
                                                <input type="hidden" name="p_status" value="'.$p_status.'">';
                                           }
                               ?>

                                </form>
                            </div>
                            </center>
</body>

</html>