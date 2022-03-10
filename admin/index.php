<?php 
session_start();  
include '../db.php';
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}

include "./templates/top.php"; 


?>
 
<?php include "./templates/navbar.php"; ?>

<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Panel</title>
    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    min-height: 100vh;
}

a {
    text-decoration: none;
}

li {
    list-style: none;
}

h1,
h2 {
    color: #444;
}

h3 {
    color: black;
}

.btn {
    background: #f05462;
    color: white;
    padding: 5px 10px;
    text-align: center;
}

.btn:hover {
    color: #f05462;
    background: white;
    padding: 3px 8px;
    border: 2px solid #f05462;
}

.title {
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding: 15px 10px;
    border-bottom: 2px solid #999;
}

table {
    padding: 10px;
}

th,
td {
    text-align: left;
    padding: 8px;
}

.container {
    position: absolute;
    width: 1150px;
    height: 100vh;
    background: #f1f1f1;
    float:center;
    text-align:center;
    margin-left: -30px;
}

.container .header {
    position: fixed;
    top: 0;
    right: 0;
    width: 80vw;
    height: 10vh;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    z-index: 1;
}


.container .content {
    position: relative;
    margin-top: -5vh;
    margin-left:-30px;
    min-height: 90vh;
    background: #f1f1f1;
}

.container .content .cards {
    padding: 20px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    text-align:center;
}

.container .content .cards .card {
    width: 250px;
    height: 150px;
    
    background-size:230px;
    margin: 1px 1px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    margin-left:10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.container .content .content-2 {
    min-height: 60vh;
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    flex-wrap: wrap;
}

.container .content .content-2 .recent-payments {
    min-height: 50vh;
    flex: 5;
    background: white;
    margin: 0 25px 25px 25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    display: flex;
    flex-direction: column;
}

.container .content .content-2 .new-students {
    flex: 2;
    background: white;
    min-height: 50vh;
    margin: 0 25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    display: flex;
    flex-direction: column;
}

.container .content .content-2 .new-students table td:nth-child(1) img {
    height: 40px;
    width: 40px;
}

@media screen and (max-width: 1050px) {
    .side-menu li {
        font-size: 18px;
    }
}

@media screen and (max-width: 940px) {
    .side-menu li span {
        display: none;
    }
    .side-menu {
        align-items: center;
    }
    .side-menu li img {
        width: 40px;
        height: 40px;
    }
    .side-menu li:hover {
        background: #f05462;
        padding: 8px 38px;
        border: 2px solid white;
    }
}

@media screen and (max-width:536px) {
    .brand-name h1 {
        font-size: 16px;
    }
    .container .content .cards {
        justify-content: center;
    }
    .side-menu li img {
        width: 30px;
        height: 30px;
    }
    .container .content .content-2 .recent-payments table th:nth-child(2),
    .container .content .content-2 .recent-payments table td:nth-child(2) {
        display: none;
    }
}
      </style>
</head>

<body>
   
    <div class="container">
      
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>Php <?php
$select = "SELECT SUM(price) as sum FROM settled ";
$count = mysqli_query($con,$select);

if(mysqli_num_rows($count)){
    while($row = mysqli_fetch_array($count)){
    $total=$row['sum'];
    }
    echo $total;
}

?>.0</h1><hr style="color:green; border:2px solid black;">

                        <h3>Total Sales</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                    <h1><?php
$select = "SELECT * FROM products";
$count = mysqli_query($con,$select);
if($counting = mysqli_num_rows($count)){
    echo $counting;
}
?></h1><hr style="color : green; border:2px solid black;">
                        <h3>Number of products</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                    <h1><?php
$select = "SELECT * FROM user_info ";
$count = mysqli_query($con,$select);
if($counting = mysqli_num_rows($count)){
    echo $counting;
}
?></h1><hr style="color : green; border:2px solid black;">
                        <h3>Number of users</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php
                        $select = "SELECT * FROM products";
                        $count = mysqli_query($con,$select);
                       
$select = "SELECT SUM(product_qty) as product_qty1 FROM products";
$count1 = mysqli_query($con,$select);
if(mysqli_num_rows($count)){
    if($counting = mysqli_num_rows($count)){
    
    while($row = mysqli_fetch_array($count1)){
    $total=$row['product_qty1']/$counting;
  
    }
}
    echo $total,"%";
}
?></h1><hr style="color : green; border:2px solid black;">
                        <h3>Critical Value</h3>
                    </div>
                   
                </div>
            </div>
           <div class="container-fluid" style="margin-top:80px;">
         <?php
         include 'sales_report2.php';
         ?>
         </div>
        </div>
    </div>

</body>

</html>
<div class="panel-footer" style="text-align: center;"><strong> Hardcore Motorshop All Copyright Reserved &copy; 2022 Team Singertunado</strong></div>
<?php include "./templates/footer.php"; ?>


<script type="text/javascript" src="./js/admin.js"></script>
