<?php include 'db.php';?>

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Funda Of Web IT</title>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card mt-4">
    <div class="card-header">
        <h4>Sales Report</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-7">

                <form action="" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>

<div class="col-md-12">
<div class="card mt-4">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
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
                echo '<td>',$row["payment_method"] ,'</td></tr>';
            }
         }
         ?>
                        else
                        {
                            ?>
                                <tr>
                                    <td colspan="4">No Record Found</td>
                                </tr>
                            <?php
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