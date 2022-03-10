<?php include 'db.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Sales Report</h4>
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                <th>Consumer</th>
                                <th>Address</th>
                                <th>Trx Id</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Datetime</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
         $sql1 = mysqli_query($con, "SELECT u.first_name,u.last_name,u.address1,u.address2,o.price,o.trx,o.p_status,o.qty,o.payment_method FROM user_info u JOIN settled o on u.email=o.email");
         if(mysqli_num_rows($sql1)>0){
             
            while($row = mysqli_fetch_array($sql1)){
                echo '<tr><td>',$row["first_name"] ," ", $row["last_name"],'</td>';
                echo '<td>',$row["address1"] ," ", $row["address2"],'</td>';
                echo '<td>',$row["trx"] ,'</td>';
                echo '<td>',$row["qty"] ,'</td>';
                echo '<td>',$row["price"] ,'</td>';
                echo '<td>',$row["p_status"] ,'</td>';
                echo '<td>',$row["payment_method"] ,'</td>';
                echo '<td>',$row["datetime"] ,'</td></tr>';
            }
         }
         ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>