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
                        $query=mysqli_query($conn,"select * from admin left join user on user.userid=admin.userid where position = 'Admin' ");
                        while($adrow=mysqli_fetch_array($query)){
                          ?>
                          <tr>
                            <td><?php echo $adrow['username']; ?></td>
                            <td><?php echo $adrow['fullname']; ?></td>
                            <td><?php echo $adrow['contact_number']; ?></td>
                            <td>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit0_<?php echo $adrow['userid']; ?>"><i class="fa fa-edit"></i></button>
                                <?php include('edit_admin_user.php'); ?>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_admin<?php echo $adrow['userid']; ?>"><i class="fa fa-trash"></i> </button>
                                <?php include('edit-users.php'); ?>
                            </td>                          
                          </tr>
                          <?php 
                        }
                      ?>
                    </tbody>
                      <tfoot>
                        <tr>
                          <th>Username</th>
                          <th>Fullname</th>
                          <th>Contact Number</th>
                          <th>Action</th>
                        </tr>          
                      </tfoot>
                  </table>
            <!---------------------------------------------------------END DATATABLE ----------------------------------------------------------->   
       