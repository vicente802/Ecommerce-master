
             <!--------------------------------------------------- DATATABLE ---------------------------------------------------------->        
                  <table id="myTable" class=" display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px;">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Fullname</th>
                        <th>Contact Number</th>
                        <th>Status</th> 
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $query=mysqli_query($conn,"select * from app_for_admission 
                          left join student on app_for_admission.userid=student.userid
                          where status = 'Pending' ");
                        while($trow=mysqli_fetch_array($query)){
                          ?>
                          <tr>
                            <td><img src="../<?php if(empty($trow['image'])){echo "./upload/profile.jpg";}else{echo $trow['image'];} ?>" id="pic" class="thumbnail" alt="Circular Image"></td>
                            <td><?php echo $trow['fullname']; ?></td>
                            <td><?php echo $trow['contact_number']; ?></td>
                            <td><?php echo $trow['status']; ?></td>
                            <td>
                                <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#view_<?php echo $trow['userid']; ?>"><i class="fa fa-view"></i> View</button>
                                <?php include('view_student.php'); ?>
                            </td>                          
                          </tr>
                          <?php 
                        }
                      ?>
                    </tbody>
                      <tfoot>
                        <tr>
                          <th>Image</th>
                          <th>Fullname</th>
                          <th>Contact Number</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>          
                      </tfoot>
                  </table>
            <!-------------------------------------------------END DATATABLE ----------------------------------------------------------->   
