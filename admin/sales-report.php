<?php 'include db.php'?>

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
                                <th>Action</th>
                                <th>Datetime</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                

                                $con = mysqli_connect("localhost","root","","");

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT * FROM users WHERE created_at BETWEEN '$from_date' AND '$to_date' ";
                                    

                                    if(mysqli_num_rows($query) > 0)
                                    {
                                        foreach($query as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['order_id']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['order']; ?></td>
                                                <td><?php echo $row['trx']; ?></td>
                                                <td><?php echo $row['qty']; ?></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['p_status']; ?></td>
                                                <td><?php echo $row['payment_method']; ?></td>
                                                <td><?php echo $row['datetime']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
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