<?php 
      $firstSql=mysqli_query($conn,"select * from semester where status = 'Active' "); 
      $firstRow = mysqli_fetch_array($firstSql); 

      $sySql = mysqli_query($conn, "select * from school_year where status = 'Active' ");
      $syRow = mysqli_fetch_array($sySql);

?>
              	<div id="1" class="tabdiv">
                    	<ul class="nav nav-tabs expand" id="tabs" >
                          <?php
                            $counter = 1;

                            $subjsql=mysqli_query($conn,"select * FROM major 
                              LEFT JOIN subject on subject.subjects_id=major.major_id 
                              LEFT JOIN courses on courses.program_id=subject.subjects_id 
                              LEFT JOIN semester on semester.sem_id=subject.subjects_id
                              WHERE major.program_id='1'  ORDER BY major_id ASC");
                            while($subjectrow=mysqli_fetch_array($subjsql)){ ?>

		                        <li class="nav-item" name="tab">
		                          <a class="nav-link" data-toggle="tab" name="tab" href="#tab-<?= $counter++; ?>"><?php echo $subjectrow['major']; ?></a>
		                        </li>
                           <?php } ?>
                    	</ul>
                      <!-- Tab panes -->
                      <div class="tab-content">
                      <?php
                        $counter2 = 1;

                        $subjsql2=mysqli_query($conn,"select * FROM major 
                          LEFT JOIN subject on subject.subjects_id=major.major_id 
                          LEFT JOIN courses on courses.program_id=subject.subjects_id 
                          LEFT JOIN semester on semester.sem_id=subject.subjects_id 
                          WHERE major.program_id='1' ORDER BY major_id ASC");

                        while($srow=mysqli_fetch_array($subjsql2)) { ?>

                        <div id="tab-<?= $counter2++; ?>" class=" tab-pane"><br>

                              <form method="POST" action="sched_print.php<?php echo '?id='.$srow['major_id']; ?>">
                                <button type="submit" class="btn btn-warning col-md-2" style="" name="generate_pdf"><i class="fas fa-print"></i> Print Schedule</button>
                              </form>
                            <div style="height: 15px;"></div>  
                          	<div>

                              <table id="dataTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px; text-align: center;">
                                <thead>
                                  <tr>
                                    <th>Time (Saturday)</th>
                                    <th>Course no.</th>
                                    <th>Descriptive Title</th>
                                    <th>Room</th>
                                    <th>Instructor</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $query=mysqli_query($conn,"select * from subject
                                      left join schedule on subject.subjects_id=schedule.subjects
                                      left join major on subject.subjects_id=major.major_id 
                                      left join courses on courses.program_id=subject.subjects_id
                                      left join instructor on instructor.instructor_id=schedule.instructor_id
                                      left join school_year on school_year.school_yr_id=schedule.school_yr_id 
                                      left join semester on semester.sem_id=subject.subjects_id
                                      where subject.program_id = '".$srow['major_id']."' AND subject.sem_id='".$firstRow['sem_id']."' AND subject.school_yr_id='".$syRow['school_yr_id']."' ");
                                    while($subjrow=mysqli_fetch_array($query) ){
                                      ?>
                                      <tr>
                                        <td><?php echo $subjrow['time_in']; ?> - <?php echo $subjrow['time_out']; ?></td>
                                        <td><?php echo $subjrow['course_no']; ?></td>
                                        <td><?php echo $subjrow['descriptive_title']; ?></td>
                                        <td><?php echo $subjrow['room']; ?></td>  
                                        <td><?php echo $subjrow['fullname']; ?></td> 
                                        <td>
                                        <?php  
                                            if (empty($subjrow['schedule_id'])) { ?>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_sched<?php echo $subjrow['subjects_id']; ?>"><i class="fas fa-clock"></i> Add Sched</button>
                                        <?php include('add_sched.php'); ?>

                                        <?php }else{ ?>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_sched<?php echo $subjrow['schedule_id']; ?>"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_sched<?php echo $subjrow['schedule_id']; ?>"><i class="fa fa-trash"></i> </button>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_sched<?php echo $subjrow['subjects_id']; ?>"><i class="fas fa-clock"></i> </button>
                                            <?php include('add_sched.php'); ?>
                                        <?php } ?>
                                            <?php include('edit-schedule.php'); ?>
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

<!------------------------------------------------------------------------- MAED ------------------------------------------------------------->


                <div id="2" class="tabdiv" style="display: none;">
                      <ul class="nav nav-tabs"  >
                          <?php
                            $counters = 1;

                            $subjsql2=mysqli_query($conn,"select * FROM major 
                              LEFT JOIN subject on subject.subjects_id=major.major_id 
                              LEFT JOIN courses on courses.program_id=subject.subjects_id 
                              LEFT JOIN semester on semester.sem_id=subject.subjects_id
                              WHERE major.program_id='2'  ORDER BY major_id ASC");
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

                        $subjsql2=mysqli_query($conn,"select * FROM major 
                          LEFT JOIN subject on subject.subjects_id=major.major_id 
                          LEFT JOIN courses on courses.program_id=subject.subjects_id 
                          LEFT JOIN semester on semester.sem_id=subject.subjects_id 
                          WHERE major.program_id='2' ORDER BY major_id ASC");

                        while($srow2=mysqli_fetch_array($subjsql2)) { ?>
                           
                        <div id="tabs-<?= $counters2++; ?>" class="tab-pane"><br>
                              <form method="POST" action="sched_printMAed.php<?php echo '?id='.$srow2['major_id']; ?>">
                                <button type="submit" class="btn btn-warning col-md-2" name="generate_pdf"><i class="fas fa-print"></i> Print Schedule</button>
                              </form>
                            <div style="height: 15px;"></div>  
                            <div>
                              <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px;  text-align: center;">
                                <thead>
                                  <tr>
                                    <th>Time (Saturday)</th>
                                    <th>Course no.</th>
                                    <th>Descriptive Title</th>
                                    <th>Room</th>
                                    <th>Instructor</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $query2=mysqli_query($conn,"select * from subject
                                      left join schedule on subject.subjects_id=schedule.subjects
                                      left join major on subject.subjects_id=major.major_id 
                                      left join courses on courses.program_id=subject.subjects_id
                                      left join instructor on instructor.instructor_id=schedule.instructor_id
                                      left join school_year on school_year.school_yr_id=schedule.school_yr_id 
                                      LEFT JOIN semester on semester.sem_id=subject.subjects_id 
                                      where subject.program_id = '".$srow2['major_id']."' AND subject.sem_id='".$firstRow['sem_id']."' AND subject.school_yr_id='".$syRow['school_yr_id']."' ");
                                    while($subjrow2=mysqli_fetch_array($query2)){
                                      ?>
                                      <tr>
                                        <td><?php echo $subjrow2['time_in']; ?> - <?php echo $subjrow2['time_out']; ?></td>
                                        <td><?php echo $subjrow2['course_no']; ?></td>
                                        <td><?php echo $subjrow2['descriptive_title']; ?></td>
                                        <td><?php echo $subjrow2['room']; ?></td>  
                                        <td><?php echo $subjrow2['fullname']; ?></td>    
                                        <td>
                                          <?php  
                                            if (empty($subjrow2['schedule_id'])) { ?>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_sched2<?php echo $subjrow2['subjects_id']; ?>"><i class="fas fa-clock"></i> Add Sched</button>
                                            <?php include('add_sched.php'); ?>
                                          <?php }else{ ?>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_sched2<?php echo $subjrow2['schedule_id']; ?>"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_sched2<?php echo $subjrow2['schedule_id']; ?>"><i class="fa fa-trash"></i> </button>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_sched2<?php echo $subjrow2['subjects_id']; ?>"><i class="fas fa-clock"></i> </button>
                                            <?php include('add_sched.php'); ?>
                                      <?php } ?>

                                            <?php include('edit-schedule.php'); ?>
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