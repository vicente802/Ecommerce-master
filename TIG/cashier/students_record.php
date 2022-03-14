<?php include('head.php'); ?>
<div class="wrapper">
    
        <nav id="sidebar">
            <div class="sidebar-header">
                <?php
                        $pic=mysqli_query($conn,"select * from cashier where userid='".$_SESSION['id']."'");
                        $prow=mysqli_fetch_array($pic);
                ?>
                    <center><img src="../<?php if(empty($prow['image'])){echo "./upload/profile.jpg";}else{echo $prow['image'];} ?>" id="logo" class="rounded-circle" alt="Circular Image" ></center ><br>
                   
            </div>

             <ul class="list-unstyled components" style="font-size: 13px;">
                <li  class="active">
                    <a href="students_record.php"><i class="fas fa-money-bill-wave"></i> |  Students Account</a>
                </li>
                <li>
                    <a href="cashier_account.php"><i class="fas fa-user-tie"></i> | Cashier's Profile</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">

                 <li>
                    <a href="#logout" class="logout" data-toggle="modal"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>

<div class="container-fluid">

        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                     <a href="#logout" class="logout d-inline-block d-lg-none ml-auto" data-toggle="modal" aria-controls="navbarSupportedContent" aria-expanded="false" style="background-color: transparent;color: #e60000"><i class="fas fa-power-off"></i> Logout</a>
                    <div class=" navbar-collapse" id="" align="center">
                  <div>
                    <?php 
                        $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
                        $syRow = mysqli_fetch_array($query);
  
                        $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                        $semRow = mysqli_fetch_array($semquer);

                      ?>
                      <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                  </div>                        <ul class="nav navbar-nav ml-auto">
                          <h5><i class="fas fa-cash-register"></i> Students Account</h5>
                        </ul>
                        <!--<a href="print_student_fee.php" class="btn btn-none btn-m" id="print"><i class="fa fa-print"></i>Print</a> -->
                    </div>
                </div>
            </nav>
                 
                <?php include('studentTable.php'); ?>
            </div>
        </div>
    </div>

<script src="dist/js/fs-modal.min.js"></script>
<?php include('tableScript.php'); ?>
<script type="text/javascript">
 $(document).ready(function() {
    $('table.display').DataTable();
} );   
</script>        
</body>
</html>