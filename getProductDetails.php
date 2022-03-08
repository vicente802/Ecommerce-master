<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if (isset($_POST["product_id"])) {
    $id = $_POST["product_id"];
    $product_query = "SELECT * FROM products WHERE product_id  = '$id' ";
    $run_query = mysqli_query($con, $product_query);
    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $pro_id = $row['product_id'];
            $pro_cat = $row['product_cat'];
            $pro_brand = $row['product_brand'];
            $pro_title = $row['product_title'];
            $pro_price = $row['product_price'];
            $pro_image = $row['product_image'];
            $pro_desc = $row['product_desc'];

            echo "
            <div class='col-md-8'>	
            <div class='row'>
                
                <div class='col-md-12 col-xs-12' id='product_msg'>
                    
                </div>
            </div>
            <img src='product_images/$pro_image'style='width:90%; height:400px;'/>
			    <label>Product Name </label><br> $pro_title<br><br>
                <label>Description </label><br>$pro_desc<br><br>
                <button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>

			";

        }
        
    }
}


?>






