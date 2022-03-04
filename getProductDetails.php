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
			    <img src='product_images/$pro_image' style='width:100%; height:350px;'/>
			      <h1>$pro_title</h1>
                <p>$pro_desc</p>
			";

        }
    }
}


?>






