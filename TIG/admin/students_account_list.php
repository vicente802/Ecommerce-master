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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $query=mysqli_query($conn,"select * from student left join user on user.userid=student.userid where position = 'Student' AND status = 'Accepted' ");
                        while($studRow=mysqli_fetch_array($query)){
                          ?>
                          <tr>
                            <td><?php echo $studRow['username']; ?></td>
                            <td><?php echo $studRow['fullname']; ?></td>
                            <td><?php echo $studRow['contact_number']; ?></td>
                            <td>
                                <a href="view_students_info.php<?php echo '?id='.$studRow['userid']; ?>" class="btn btn-primary btn-sm" style="color: white"><i class="fa fa-eye"></i></a>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit0_<?php echo $studRow['userid']; ?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_stud<?php echo $studRow['userid']; ?>"><i class="fa fa-trash"></i> </button>
                                <?php include('student-files.php'); ?>
                            </td>                          
                          </tr>
                          <?php 
                        }
                      ?>
                    </tbody>
                    
                  </table>
            <!---------------------------------------------------------END DATATABLE ----------------------------------------------------------->   
       
       
            </div>
        </div>
    </div>

    <?php include('tableScript.php'); ?>
<script type="text/javascript">
 $(document).ready(function() {
    $('table.display').DataTable();
} );   
</script>
</body>
</html>


  