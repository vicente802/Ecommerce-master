<?php
include 'db.php';
$pro_id = $_POST['prod_id'];

   


?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <a href="cart.php"><button type="button" class="close"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></a>
      </div>
      
      <div class="modal-body">
        <form action="" method="POST">
          <div class="row">
          <div class="col-md-12">
              <div class="form-group">
             <table>
             <?php

$product_query = "SELECT * FROM products WHERE product_id='$pro_id'";
$run_query = mysqli_query($con,$product_query);
if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query)){
      $pro_image = $row['product_image'];
      $title = $row['product_title'];
    
     ?>
     <tr>
       
       <td><div class="row">
         <div class="col-md-10"></div>
         <div class="col-md">
           <?php echo "<img src='product_images/$pro_image' style='width:160px; height:160px;'/>"; ?>
         </div>
       </div>
        </td>
      </tr>
     <tr>
       <td><b>Product Name :</b> <?php echo $title ?></td>
       <td><b>Product Name :</b> <?php echo $title ?></td>
     </tr>
     <?php
    echo"	<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>";
    }
}

?>
        </table>
        </div>
      </div>
    </div>
  </div>
  
   
</body>

</html>