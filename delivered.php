<?php
require "db.php";

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index1.php");
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
    <style>
    table tr td {
        padding: 10px;
    }

    .row a button {
        text-decoration: none;
        border: none;
        margin-left: 0px;
        font-size: large;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        border-bottom: 4px solid red;
        width: 175px;
        background: transparent;
    }

    .row a button:hover {
        color: red;
        background: pink;
    }
    </style>
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand" style="margin-left: 5px;color:white;">Hardcore Motorshop</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index2.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                <li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
                <li><a href="services.php"><span class="glyphicon glyphicon-globe"></span>Services</a></li>
                <li><a href="contactus.php"><span class="glyphicon glyphicon-earphone"></span>Contact Us</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" id="cart_container"><span class="glyphicon glyphicon-shopping-cart"></span>View
                        Cart<span class="badge"></span></a>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                            class="glyphicon glyphicon-user"></span><?php $user=$_SESSION['name'];  echo "".$user; ?></a>
                    <ul class="dropdown-menu">
                        <li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="">Cart</a></li>
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
    </div>
    <p><br /></p>
    <p><br /></p>
    <p><br /></p>
    <div class="container-fluid">
        <div class="row" style="margin: left -11px;">
            <div class="col-lg text-center">
                <br>
                <br>
                <table style=" text-align:center; ">
                    <a href="customer_order.php"><button>Processing</button></a>
                    <a href="preparing.php"><button>Preparing</button></a>
                    <a href="shipping.php"><button>To Ship</button></a>
                    <a href="#"><button style="background:pink;">Delivered</button></a>
                    <a href="history.php"><button>History</button></a>

                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">

                        <hr />
                        <?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];
							$orders_list = "SELECT o.order_id,o.user_id,o.product_id,o.qty,o.trx_id,o.shipping,o.cancel,o.receive,o.p_status,o.email,p.product_title,p.product_price,p.product_image,product_desc FROM delivered o,products p WHERE o.user_id='$user_id' AND o.product_id=p.product_id";
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									?>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <img style="float:right;" src="product_images/<?php echo $row['product_image']; ?>"
                                    class="img-responsive img-thumbnail" />
                            </div>
                            <div class="col lg">
                                <table>
                                    <?php 
													$order_id = $row["order_id"];
													$user_id = $row["user_id"];
													$product_price = $row["product_price"]; 
													$product_id = $row["product_id"];
													$qty = $row["qty"];
													$total = $product_price * $qty;
													$trx_id = $row["trx_id"];
													$shipped = $row["shipping"];
													$cancel = $row['cancel'];
													$receive = $row['receive'];
													$product_title = $row["product_title"];
													$desc = $row["product_desc"];
													$email = $row["email"];
															
															
													?>


                                    <form action="action.php" method="POST">
                                        <input type="hidden" name="order_id" value="<?php echo $order_id?>">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                        <input type="hidden" name="product_price" value="<?php echo $product_price?>">
                                        <input type="hidden" name="product_id" value="<?php echo $product_id?>">
                                        <input type="hidden" name="qty" value="<?php echo $qty?>">
                                        <input type="hidden" name="total" value="<?php echo $total?>">
                                        <input type="hidden" name="trx_id" value="<?php echo $trx_id?>">
                                        <input type="hidden" name="product_title" value="<?php echo $product_title?>">
                                        <input type="hidden" name="shipped" value="<?php echo $shipped?>">
                                        <input type="hidden" name="cancel" value="<?php echo $cancel?>">
                                        <input type="hidden" name="receive" value="<?php echo $receive?>">
                                        <input type="hidden" name="desc" value="<?php echo $desc?>">
                                        <input type="hidden" name="email" value="<?php echo $email?>">


                                        <tr>
                                            <td>Product Name</td>
                                            <td><b><?php echo $row["product_title"]; ?></b> </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td><b><?php echo $row["shipping"]; ?></b> </td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td><b><?php echo $row["product_desc"]; ?></b> </td>
                                        </tr>
                                        <tr>
                                            <td>Product Price</td>
                                            <td><b><?php echo  CURRENCY." " .$total ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Quantity</td>
                                            <td><b><?php echo $row["qty"]; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Transaction Id</td>
                                            <td><b><?php echo $row["trx_id"]; ?></b></td>
                                            <input type="hidden" name="canceled" value="Requesting cancel">
                                            <input type="hidden" name="order_id"
                                                value="<?php echo $row["order_id"]; ?>">
                                            <?php $cancel = $row["cancel"]; if(!empty($cancel)){ echo'<td><input style="float:right;" type="submit" name="cancel" class="btn btn-danger" value="'.$row['cancel'].'"></td>';}?>
                                            <?php $receive = $row["receive"]; if(!empty($receive)){ echo'<td><input style="float:right;" type="submit" name="receive" class="btn btn-success" value="'.$row['receive'].'"></td></tr>';}?>
                                    </form>
                                </table>

                            </div>
                        </div>
                        <hr>
                        <?php
								}
							}
						?>

                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
            <div class="col-md-2"></div>

        </div>
</body>

</html>