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
                        <ul class="nav navbar-nav ml-auto">
                          <h3><i class="fas fa-users"></i> Cashier Users</h3>
                        </ul>
                    </div>
                </div>
            </nav>
            <button class="btn btn-primary btn-sm" data-target="#add_cashier_modal" data-toggle="modal" style="background-color: #4080bf"><i class="fa fa-plus-circle"></i> New cashier</button>
            
            <div class="line"></div>
            
                 <?php include('cashierTable.php'); ?>
       
            </div>
        </div>
    </div>
    <?php include('add_cashier_modal.php'); ?>
    <?php include('tableScript.php'); ?>

</body>
</html>


  