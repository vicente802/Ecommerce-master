             <!--------------------------------------------------- DATATABLE ---------------------------------------------------------->        
                  <table id="myTable" class=" display table table-responsive-md table-hover table table-bordered" style="width:100%; text-align: center; font-size: 13px;">
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
                        $query=mysqli_query($conn,"select * from cashier left join user on user.userid=cashier.userid where position = 'Cashier' ");
                        while($trow=mysqli_fetch_array($query)){
                          ?>
                          <tr>
                            <td><?php echo $trow['username']; ?></td>
                            <td><?php echo $trow['fullname']; ?></td>
                            <td><?php echo $trow['contact_number']; ?></td>
                            <td>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit0_<?php echo $trow['userid']; ?>"><i class="fa fa-edit"></i></button>
                                <?php include('edit_cashier_user.php'); ?>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_cashier<?php echo $trow['userid']; ?>"><i class="fa fa-trash"></i> </button>
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
            <!-------------------------------------------------END DATATABLE ----------------------------------------------------------->   
       