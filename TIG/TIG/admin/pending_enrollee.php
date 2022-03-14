      <!--------------------------------------------------- DATATABLE ---------------------------------------------------------->        
                  <table id="myTable" class=" display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px; text-align: center;">
                    <thead>
                      <tr>
                        <th>Student ID</th>
                        <th>Fullname</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $sqlEn=mysqli_query($conn,"select * from enrollment 
                          left join student on enrollment.student_id=student.userid
                          left join app_for_admission on app_for_admission.userid=enrollment.student_id
                          where enrollment.status = 'Pending' ");
                        while($penrow=mysqli_fetch_array($sqlEn)){
                          ?>
                          <tr>
                            <td><?php echo $penrow['student_id']; ?></td>
                            <td><?php echo $penrow['fullname']; ?></td>
                            <td><?php echo $penrow['contact_number']; ?></td>
                            <td>
                                
                                <?php include('edit_status.php'); ?>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view_<?php echo $penrow['userid']; ?>"><i class="fa fa-view"></i> View</button>
                                <?php include('view_student_subjects.php'); ?>
                            </td>                          
                          </tr>
                          <?php 
                        }
                      ?>
                    </tbody>
                      <tfoot>
                        <tr>
                          <th>Student ID</th>
                          <th>Fullname</th>
                          <th>Contact Number</th>
                          <th>Action</th>
                        </tr>          
                      </tfoot>
                  </table>
            <!-------------------------------------------------END DATATABLE ----------------------------------------------------------->   
