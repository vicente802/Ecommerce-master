<?php include('head.php'); ?>
<div class="wrapper">

<?php include('navbar.php'); ?>
<?php include("connect.php");?>

<style type="text/css">
 .en{
    padding: 30px; 
    background-color: #00b33c;
    border-radius: 15px; 
 } 
 .pend{
    padding: 30px; 
    background-color: #b30000; 
    border-radius: 15px;
 }
</style>

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
                        <ul class="nav navbar-nav ml-auto">
                          <h5>Admin Dashboard</h5>
                        </ul>
                    </div>
                </div>
            </nav>
            <div>
              <center>
                <h1>Taguig Integrated School Admin</h1>
              </center>
            </div>
      <div class="line"></div>
</body>
</html>  
  