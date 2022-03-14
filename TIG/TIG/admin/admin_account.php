<?php include('head.php'); ?>
<style type="text/css">   
.inputLine {
    border: 0;
    border-bottom: 1px solid #000;
    background-color: white;
}    
</style>
<div class="wrapper">
<?php include('navbar.php') ?>

<div class="container-fluid">

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
                            <h5><i class="fas fa-cogs"></i> Admin account</h5>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php
                $asq=mysqli_query($conn,"select * from admin left join user on user.userid=admin.userid where user.userid='".$_SESSION['id']."'");
                $acrow=mysqli_fetch_array($asq);
            ?>  
                        <br>
                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username" name="username" readonly="" value="<?php echo ($acrow['username']); ?>" style="background-color: transparent;">
                          </div>
                        </div>

                            <div class="col-auto">
                              <label class="sr-only" for="inlineFormInputGroup">Fullname</label>
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" style="width: 50px"><i class="fas fa-address-card"></i></div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Fullname" name="fullname" readonly="" value="<?php echo ucwords($acrow['fullname']); ?>" style="background-color: transparent;">
                              </div>
                            </div>

                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Contact Number</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-phone"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Contact Number" name="contact_number" readonly="" value="<?php echo ($acrow['contact_number']); ?>" style="background-color: transparent;">
                          </div>
                        </div>

                        <input type="hidden" name="image" value="<?php echo ($arow1['image']); ?>">  

                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Password</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fab fa-slack-hash"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Password" name="password" readonly="" value="########" style="background-color: transparent;">
                          </div>
                        </div>
                        <br>
 
                    <input type="hidden" name="id" value="<?php echo ($arow['id']); ?>">  

                        <center><a  class="btn btn-primary btn-sm" data-toggle="modal" href="#edit_prof_<?php echo $acrow['userid']; ?>" style="background-color: #4080bf; "> <i class="fa fa-edit"></i> | Edit account</a></center>
 
            </div>
        </div>
    </div>
</div>
</div>
<?php include('edit_account_page.php'); ?>
<script src="dist/js/fs-modal.min.js"></script>
</body>
</html>


  