<?php
session_start();

include '../db.php';
$user_id = $_SESSION['uid'];
$sql = mysqli_query($con, "SELECT * FROM orders WHERE user_id='$user_id'");
if(mysqli_num_rows($sql)>0){
    while($row = mysqli_fetch_array($sql)){
        $product_id =$row['product_id'];
        $qty = $row['qty'];
   
$sql1 = mysqli_query($con, "SELECT * FROM products");
if(mysqli_num_rows($sql1)>0){
    while($row1 = mysqli_fetch_array($sql1)){
$product_qty = $row1['product_qty'];

 


}

}
$total = $product_qty - $qty;
mysqli_query($con, "UPDATE products SET product_qty='$total' WHERE product_id='$product_id'");
mysqli_query($con, "DELETE FROM cart ");
?>
<script type="text/javascript">
alert("Your ordered product has been processed!");
location="../profile.php";
</script>
<?php
    }
   
}
else{
    ?>
                   <script type="text/javascript">
                   alert("Check the OTP code");
                   location="verification.php";
                   </script>
                   <?php
}

?>
