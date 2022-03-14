                <?php 
                  $firstSql=mysqli_query($conn,"select * from semester where sem_id = '1' ");
                  $firstRow = mysqli_fetch_array($firstSql);
                ?>  

             	<div id="1" class="tabdiv">

                    	<ul class="nav nav-tabs" id="tabs" >
                          <?php
                            $counter = 0;

                            $subjsql=mysqli_query($conn,"select * FROM major 
                              LEFT JOIN subject on subject.subjects_id=major.major_id 
                              LEFT JOIN courses on courses.program_id=subject.subjects_id 
                              LEFT JOIN semester on semester.sem_id=subject.subjects_id
                              WHERE major.program_id='1' ORDER BY major_id ASC");
                            while($subjectrow=mysqli_fetch_array($subjsql)){ ?>

                                <li class="active" name="tab">
                                  <a class="nav-link" data-toggle="tab" class="tab" name="tab" href="#tab-<?= $counter++; ?>"><?php echo $subjectrow['major']; ?></a>
                                </li>
                          <?php } ?>
                    	</ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                      <?php
                        $counter2 = 0;

                        $subjsql2=mysqli_query($conn,"select * FROM major 
                          LEFT JOIN subject on subject.subjects_id=major.major_id 
                          LEFT JOIN courses on courses.program_id=subject.subjects_id 
                          LEFT JOIN semester on semester.sem_id=subject.subjects_id
                          WHERE major.program_id='1' ORDER BY major_id ASC");

                        while($srow=mysqli_fetch_array($subjsql2)) { ?>
                           
                        <div id="tab-<?= $counter2++; ?>" class="container tab-pane"><br>
                          <div class="row">
                          </div><br>
                          	<div>
                              <table id="dataTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px; text-align: center;">
                                <thead>
                                  <tr>
                                    <th>Course no.</th>
                                    <th>Descriptive Title</th>
                                    <th>Units Lec</th>
                                    <th>Units Lab</th>
                                    <th>Hours</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $query=mysqli_query($conn,"select * from subject 
                                      left join major on subject.subjects_id=major.major_id 
                                      left join courses on courses.program_id=subject.subjects_id 
                                      left join semester on semester.sem_id=subject.subjects_id
                                      where subject.program_id = '".$srow['major_id']."' AND subject.sem_id='".$firstRow['sem_id']."' ");
                                    while($subjrow=mysqli_fetch_array($query)){ ?>
                                      <tr>
                                        <td><?php echo $subjrow['course_no']; ?></td>
                                        <td><?php echo $subjrow['descriptive_title']; ?></td>
                                        <td><?php echo $subjrow['units_lec']; ?></td>
                                        <td><?php echo $subjrow['units_lab']; ?></td>
                                        <td><?php echo $subjrow['hours']; ?></td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_1_<?php echo $subjrow['subjects_id']; ?>"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_subject<?php echo $subjrow['subjects_id']; ?>"><i class="fa fa-trash"></i> </button>
                                            <?php include('edit-subjects.php'); ?>
                                        </td>                          
                                      </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                              </div>
                          </div>
   						         <?php } ?>
                    </div>
          
            </div>

<!----------------------------------------------------------------- MAED ------------------------------------------------------->

                <div id="2" class="tabdiv" style="display: none;">
             
                      <ul class="nav nav-tabs"  >
                          <?php
                            $counters = 1;

                            $subjsql2=mysqli_query($conn,"select * FROM major 
                              LEFT JOIN subject on subject.subjects_id=major.major_id 
                              LEFT JOIN courses on courses.program_id=subject.subjects_id 
                              WHERE major.program_id='2' ORDER BY major_id ASC");
                            while($subjectrow2=mysqli_fetch_array($subjsql2)){ ?>

                            <li class="nav-item" name="tab">
                              <a class="nav-link" data-toggle="tab"  href="#tabs-<?= $counters++; ?>"><?php echo $subjectrow2['major']; ?></a>
                            </li>
                           <?php } ?>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                      <?php
                        $counters2 = 1;

                        $subjsql2=mysqli_query($conn,"select * FROM major LEFT JOIN subject on subject.subjects_id=major.major_id LEFT JOIN courses on courses.program_id=subject.subjects_id WHERE major.program_id='2'  ORDER BY major_id ASC");

                        while($srow2=mysqli_fetch_array($subjsql2)) { ?>
                           
                        <div id="tabs-<?= $counters2++; ?>" class="container tab-pane"><br>
                          <div class="row">
                             </div><br>
                            <div>
                              <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px; text-align: center;">
                                <thead>
                                  <tr>
                                    <th>Course no.</th>
                                    <th>Descriptive Title</th>
                                    <th>Units Lec</th>
                                    <th>Units Lab</th>
                                    <th>Hours</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $query2=mysqli_query($conn,"select * from subject 
                                      left join major on subject.subjects_id=major.major_id 
                                      left join courses on courses.program_id=subject.subjects_id 
                                      where subject.program_id = '".$srow2['major_id']."' AND subject.sem_id='".$firstRow['sem_id']."' ");
                                    while($subjrow2=mysqli_fetch_array($query2)){ ?>
                                      <tr>
                                        <td><?php echo $subjrow2['course_no']; ?></td>
                                        <td><?php echo $subjrow2['descriptive_title']; ?></td>
                                        <td><?php echo $subjrow2['units_lec']; ?></td>
                                        <td><?php echo $subjrow2['units_lab']; ?></td>
                                        <td><?php echo $subjrow2['hours']; ?></td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_2_<?php echo $subjrow2['subjects_id']; ?>"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_subject<?php echo $subjrow2['subjects_id']; ?>"><i class="fa fa-trash"></i> </button>
                                            <?php include('edit-subjects.php'); ?>
                                        </td>                          
                                      </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                              </div>
                          </div>
                        <?php } ?>
                    </div>
           
            </div>