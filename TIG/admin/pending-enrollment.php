<?php include('head.php'); ?>
<div class="wrapper">
    
<?php include('navbar.php') ?>
<div class="container-fluid">


<head>

</head>
        <!-- Page Content Holder -->
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
                          <?php $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
                            $syRow = mysqli_fetch_array($query)
                          ?>

                            <?php $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                            $semRow = mysqli_fetch_array($semquer);
                          ?>
                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                          <h5><i class="fas fa-exclamation-circle"></i> Pending Enrollee</h5>
                        </ul>
                    </div>
                </div>
            </nav>
            
                 <?php include('pending_enrollee.php'); ?>
       
            </div>
        </div>
    </div>
    <?php include('tableScript.php'); ?>
    <script src="dist/js/fs-modal.min.js"></script>
</body>
</html>


  