<?php
session_start();
include 'db.php';

$combine = "SELECT p.product_id,p.product_title,p.product_qty,p.product_desc,p.product_price,c.p_id,c.user_id,c.qty,u.user_id,u.address1,u.street,u.address2,u.mobile FROM products p join cart c on p.product_id=c.p_id join user_info u on c.user_id=u.user_id WHERE c.user_id='$_SESSION[uid]'";
$result = mysqli_query($con, $combine);
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
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

<h2 class="modal-title" id="exampleModalLabel">Order Details</h2>
<a href="cart.php">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</a>


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
                            $result = mysqli_query($con, $combine);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<h4>", $row['product_title'], "</h4><hr>";
                                    echo '<input type="hidden" name="product_title" value="' . $row['product_title'] . '">';

                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php

                            $combine = "SELECT p.product_id,p.product_title,p.product_qty,p.product_desc,p.product_price,c.p_id,c.user_id,c.qty,u.user_id,u.address1,u.street,u.address2,u.mobile FROM products p join cart c on p.product_id=c.p_id join user_info u on c.user_id=u.user_id  WHERE c.user_id='$_SESSION[uid]'";
                            $result = mysqli_query($con, $combine);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?><br><?php
                                    echo "<h4 style='padding-left:145px;' >", $row['qty'], "<hr></h4>";
                                    echo '<input type="hidden" name="qty" value="' . $row['qty'] . '">';

                                }
                            } ?>
                        </td>
                        <td>
                            <?php
                            $total_price = 0;
                            $combine = "SELECT p.product_id,p.product_title,p.product_qty,p.product_desc,p.product_price,c.p_id,c.user_id,c.qty,u.user_id,u.address1,u.street,u.address2,u.mobile FROM products p join cart c on p.product_id=c.p_id join user_info u on c.user_id=u.user_id  WHERE c.user_id='$_SESSION[uid]'";
                            $result = mysqli_query($con, $combine);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $total_price = $total_price + $row['qty'] * $row['product_price'];
                                    $total = $row['qty'] * $row['product_price'];
                                    echo "<br/><h4 style='padding-left:10px;' >" . $total . "</h4><hr>";
                                    echo '<input type="hidden" name="total" value="' . $total . '">';

                                    echo '<input type="hidden" name="user" value="' . $row['user_id'] . '">';
                                    echo '<input type="hidden" name="p_id" value="' . $row['p_id'] . '">';


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
                <h4 style="text-transform:capitalize;"><?php echo $street, " ", $add, " ", $add2 ?></h4>

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
                <select name="payment_option" id="payment_option" onchange="changeStatus()"
                        style="width:470px; height:40px; font-size:20px;">
                    <option value="Status">Status</option>
                    <option name="gcash" value="Gcash">Gcash</option>
                    <option name="paypal" value="Paypal">Paypal</option>
                    <option value="cod">Cash On Delivery</option>
                </select>
            </div>
        </div>


        <div class="col-md-12" style="text-align:right">
            <?php
            echo ' Total Price <h4>PHP ', $total_price, '</h4>';
            echo '<input type="hidden" name="total_price" value="' . $total_price . '">';
            ?></label>

            <table>
                <div class="col-md-10">
                    <tr style="text-align:right; float:right; position:relative">
                        <td style="position:relative;">
                            <button type="submit" name="submit" id="gcash"
                                    style=" display:none; margin-left:257px; width:190px; backround:transparent; border:none; border-radius:10px; ">
                                <img src="imgs/gcash.jpeg" style="border-radius:5px;" width="200" height="50"></button>
                        </td>
                        <td style="position:relative;">
                            <button type="submit" name="submit" id="paymaya" class="btn btn-primary "
                                    style="display:none;margin-left:370px;">Checkout
                            </button>
                        </td>


                        <td style="position:relative;">
                            <button type="submit" name="submit" id="cashondeliver" class="myButton"
                                    style="display:none;margin-left:270px; color:white; width:190px;">Cash On Delivery
                            </button>
                        </td>


                </div>
        </div>
    </div>
</form>
<div id="paypal" style="display:none; position:relative;">
    <?php include 'paypal/paypal.php'; ?>
    </tr>
</div>
</table>
