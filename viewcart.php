<?php
include 'db.php';
session_start();
$pro_id = $_POST['prod_id'];
$user_id = $_SESSION['uid'];

   


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
      <div class="modal-header" style="background:black; color:white;">
        <h2 class="modal-title" id="exampleModalLabel">Order Details</h2>
        <a href="profile.php"><button type="button" class="close" style="color:white; opacity:1; margin-top:-15px;" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></a>
      </div>
      
      <div class="modal-body">
        <form action="view.php" method="POST">
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
      $pro_desc = $row['product_desc'];
      $qty = $row['product_qty'];
     
     ?>
     <tr>
       
       <td><div class="row">
         <div class="col-md-4"></div>
         <div class="col-md-12" style="border:1px solid black;">
           <?php echo "<img src='product_images/$pro_image' style='float:center; margin-left:150px; width:160px; height:160px;'/>"; ?>
         </div>
       </div>
      </td>
     </tr>
     <tr>
      <div class="row" >
        <div class="col-md-1"></div>
        <div class="col-md-7" >
       <td><br><b>Product Name :</b><br> <?php echo $title ?></td>
       <tr>
       <td><br><b>Description :</b> <br><?php echo $pro_desc ?></td>
       </tr>
       </div>
       </div>
       </tr>
       <tr>
   <td><br><?php
    echo"	<button pid='$pro_id' style='float:right; width:200px; height:50px; margin-top:10px;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>";
    }
}

?>
</td>
</tr>
<input type="text" name="pro_id" value="<?php echo $pro_id ?>">
<input type="text" name="user_id" value="<?php echo $user_id ?>">
             </table>
              </div>
          </div>
          </div>
        </form>
      </div>
    </div>
</div>
</body>

</html>