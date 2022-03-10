<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>
    
    <div class="container-fluid" style="margin-top:-50px; text-align:center; font-size:13px;">
        
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt">
                    <div class="card-header text-center">
                        <h4>Sales Report</h4>
                        	
      
      <style>
          @media print{
              body *{
                    visibility: hidden;
              } 
              .printer-container, .printer-container *{
                    visibility: visible;
              }
          }
      </style>
      <button onclick="window.print();">
          Print
      </button>
                    <div class="row print-container">
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
                    </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                <th>Consumer</th>
                                <th>Product Name</th>
                                <th>Trx Id</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Datetime</th>
                                <th></th>
                                </tr>
                                
                            </thead>
                            <tbody>
                            
                            <?php
                             if(isset($_GET['from_date']) && isset($_GET['to_date']))
                             {
                                 $from_date = $_GET['from_date'];
                                 $to_date = $_GET['to_date'];
                                 $sql1 = mysqli_query($con, "SELECT s.product_id,s.trx,s.qty,s.price,s.p_status,s.payment_method,s.datetime,s.email,u.email,u.first_name,u.last_name,p.product_id,p.product_title FROM settled s join user_info u on s.email=u.email join products p on s.product_id=p.product_id WHERE s.datetime BETWEEN '$from_date' AND '$to_date' ");
         if(mysqli_num_rows($sql1)>0){
            $total = 0;
            while($row = mysqli_fetch_array($sql1)){
                
                $total = $total + $row['qty'] * $row['price'];
              echo"
              <tr>
              <td>".$row['first_name']." ". $row['last_name']."</td>
              <td>".$row['product_title']." </td>
              <td>".$row['trx']." </td>
              <td>".$row['qty']."</td>
              <td>".$row['price']."</td>
              <td>".$row['p_status']."</td>
              <td>".$row['payment_method']."</td>
              <td>".$row['datetime']."</td>
             
              </tr>";
        
            }
            echo' <tr><h1 style="text-align:right;">&#8369; '.$total.' </h1></tr>';
         }
        
        }
        else{
            echo 'No record';
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
<?php include "./templates/footer.php"; ?>
</html>