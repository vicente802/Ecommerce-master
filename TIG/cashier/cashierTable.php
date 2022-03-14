             <!----------------------------------------------------------- DATATABLE ------------------------------------------------------------>        
                  <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Contact Number</th>
                        <th>Password</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $query=mysqli_query($conn,"select * from user left join cashier on cashier.userid=user.userid where status = 'Accept' and position = 'Admin' ");
                        while($adrow=mysqli_fetch_array($query)){
                          ?>
                          <tr>
                            <td><img src="../<?php if(empty($adrow['image'])){echo "./upload/profile.jpg";}else{echo $adrow['image'];} ?>" id="pic" class="thumbnail" alt="Circular Image"></td>
                            <td><?php echo $adrow['username']; ?></td>
                            <td><?php echo $adrow['fullname']; ?></td>
                            <td><?php echo $adrow['contact_number']; ?></td>
                            <td>##########</td>
                            <td>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit0_<?php echo $adrow['userid']; ?>"><i class="fa fa-edit"></i> Edit</button>
                                <?php include('edit_admin_user.php'); ?>
                            </td>                          
                          </tr>
                          <?php 
                        }
                      ?>
                    </tbody>
                      <tfoot>
                        <tr>
                          <th>Image</th>
                          <th>Username</th>
                          <th>Fullname</th>
                          <th>Contact Number</th>
                          <th>Password</th>
                          <th>Action</th>
                        </tr>          
                      </tfoot>
                  </table>
            <!---------------------------------------------------------END DATATABLE ----------------------------------------------------------->   
       