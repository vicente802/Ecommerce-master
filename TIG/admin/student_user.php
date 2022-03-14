<?php include('head.php'); ?>
<div class="wrapper">
<?php include('navbar.php') ?>
<div class="container-fluid">
<?php include('admin_user_css.css'); ?>

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
                          <h5><i class="fas fa-user-friends"></i> Student Users</h5>
                        </ul>
                    </div>
                </div>
            </nav>
            
             <!----------------------------------------------------------- DATATABLE ------------------------------------------------------------>        
                  <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; text-align: center;font-size: 13px;">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Contact Number</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $query=mysqli_query($conn,"select * from student left join user on user.userid=student.userid where position = 'Student' AND status = 'Pending' ");
                        while($pendRow=mysqli_fetch_array($query)){
                          ?>
                          <tr>
                            <td><?php echo $pendRow['username']; ?></td>
                            <td><?php echo $pendRow['fullname']; ?></td>
                            <td><?php echo $pendRow['contact_number']; ?></td>
                            <td><?php echo $pendRow['status']; ?></td>
                            <td>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#aksep_<?php echo $pendRow['userid']; ?>"><i class="fa fa-check"></i></button>
                                
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_pend<?php echo $pendRow['userid']; ?>"><i class="fa fa-trash"></i> </button>
                                <?php include('edit-users.php'); ?>
                            </td>                          
                          </tr>
                          <?php 
                        }
                      ?>
                   </tbody>
                    <?php 
                    ?>
                      <tfoot>
                        <tr>
                          <th>Username</th>
                          <th>Fullname</th>
                          <th>Contact Number</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>          
                        <tr>
                          <td></td>
                        </tr>
                      </tfoot>
                  </table>-->
            <!---------------------------------------------------------END DATATABLE ----------------------------------------------------------->   
       
       
            </div>
        </div>
    </div>

    <?php include('tableScript.php'); ?>

</body>
</html>


  