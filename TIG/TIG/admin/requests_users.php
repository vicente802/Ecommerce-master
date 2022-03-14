<?php include('head.php'); ?>
<div class="wrapper">
<?php include('navbar.php'); ?>
<div class="container-fluid">


<head>
    <style type="text/css">
        .error_form
            {
                top: 12px;
                color: rgb(216, 15, 15);
                font-size: 13px;
                font-family: Helvetica;
            }
        #pic 
            {
                height: 30px; width: 30px;
            }    
    </style>
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
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div style="margin-left: 20px;">
                          <?php $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
                            $syRow = mysqli_fetch_array($query)
                          ?>

                            <?php $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                            $semRow = mysqli_fetch_array($semquer);
                          ?>
                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                          <h3><i class="fas fa-exclamation-circle"></i> Pending Users Request</h3>
                        </ul>
                    </div>
                </div>
            </nav>
            
                 <?php include('pending.php'); ?>
       
            </div>
        </div>
    </div>
    <?php include('tableScript.php'); ?>
    <script src="dist/js/fs-modal.min.js"></script>
</body>
</html>


  