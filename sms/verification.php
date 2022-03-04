<?php
session_start();
include '../db.php';
$user_id = $_SESSION['uid'];  
         $sql = "SELECT u.user_id,c.user_id,c.p_id,c.qty,p.product_id FROM user_info u join cart c on u.user_id=c.user_id join products p on p.product_id=c.p_id WHERE u.user_id='$user_id'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_array($result)){
                    $pro_id = $row['p_id'];
                    $qty = $row['qty'];
                    echo $row['p_id'];
                    echo $row['qty'];
                
            
    
/* 
if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_array($result)){
            $ver = $row['verification'];
        }
        if($code == $ver){
          
            echo 'success 
            
            <input type="text" value=""';

    }
      
    else{
        echo 'Error';
    }
              
}
}*/
mysqli_query($con,"INSERT INTO orders(product_id,user_id)values('".$row['p_id']."','".$row['user_id']."')");
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>   
    
     
    
   
  
</body>
</html>