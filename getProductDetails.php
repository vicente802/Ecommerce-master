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
            $pro_qty = $row['product_qty'];

            echo "
           
            <div class='row'>
            <div class='col-md-12'>	</div>
            <div class='col-md-10'>
            <div class='border' style='border:1px solid black;'>
            <img src='product_images/$pro_image'style='width:90%; height:400px; float:center; margin-left:75px;'/>
            </div>
            <div class='row' style='text-align:center;'>
            <div class='col-md-7'></div>
            <div class='col-md'>
            <label style='background:lightgrey; font-weight:10; opacity:.5; font-size:18px; text-align:center; float:right; width:200px; margin-top:-30px; position:absolute; border-radius:5px 5px 5px 5px; color:black;'>Available Stocks: $pro_qty<br></label>
            </div>
            </div>
            <label>Product Name </label><br> $pro_title<br><br>
                <label>Description </label><br>$pro_desc<br>
                <div class='right' style='width:50%; margin-right:-100px;  float:right;'>
              
                <h3 style='margin-right:40px; float:right;'>Price: &#8369; $pro_price </h3>
                
               <button pid='$pro_id' style='width:80%; float:right'  id='product'  data-dismiss='modal'  class='btn btn-danger'>AddToCart</button>
                </div>
               
            </div>
    
            

			";

        }
        
    }
}


?>






