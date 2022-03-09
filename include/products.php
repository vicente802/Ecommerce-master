<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "login";

$con = mysqli_connect($servername, $username, $password,$db);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title></title>-->
<!--</head>-->
<!--<body>-->
    <div class="container-fluid" >
    <div class="col-md">	
				
			
					<div class="panel-heading"><label>Best Seller</label> </div>
					<div class="panel-body">
					<?php

	$limit = 6;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products ORDER BY product_qty asc LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_desc = $row['product_desc'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
							
								<div class='panel-body'>
									<img style='position:relative; background:white; margin-top:-100px; width:80px; margin-left:-130px; z-index:1;'  src='imgs/best2.jpg'><img src='product_images/$pro_image' style='width:160px; height:160px;'/>
								</div>
								<div class='panel-heading'>".CURRENCY." $pro_price.00
                                <input type='hidden' name='prod_id' value=$pro_id>	
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
									<button style='float:right;' id='$pro_id' class='btn btn-primary btn-xs details-btn' data-toggle='modal' data-target=''>details</button>
									</div>
							</div>
						</div>	
			";
		}
	}
                    ?>
					</div>
                </div>
    
    </div>
<!---->
<!--</body>-->
<!--</html>-->