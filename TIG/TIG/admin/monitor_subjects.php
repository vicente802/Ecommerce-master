<?php include('head.php'); ?>
<div class="wrapper">
<?php include('navbar.php') ?>
<div class="container-fluid">


<head>

</head>
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
                        <div>
                        <?php 
                            $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
                            $syRow = mysqli_fetch_array($query);
      
                            $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                            $semRow = mysqli_fetch_array($semquer);

                          ?>
                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                          <h5> <i class="far fa-eye"></i> Monitor Subjects</a></h5>
                        </ul>
                    </div>
                </div>
            </nav>

                <div class="tabdiv">
                        <ul class="nav nav-tabs expand" id="tabs" >
                          <?php
                            $counter = 1;

                            $subjsql=mysqli_query($conn,"select * FROM major 
                              LEFT JOIN subject on subject.subjects_id=major.major_id 
                              LEFT JOIN courses on courses.program_id=subject.subjects_id 
                              LEFT JOIN semester on semester.sem_id=subject.subjects_id
                               ORDER BY major_id ASC");
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
                           ORDER BY major_id ASC");

                        while($srow=mysqli_fetch_array($subjsql2)) { ?>

                        <div id="tab-<?= $counter2++; ?>" class=" tab-pane"><br>

                              <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 13px; text-align: center;">
                                <thead>
                                  <tr>
                                    <th>Major</th>
                                    <th>Course no.</th>
                                    <th>Descriptive Title</th>
                                    <th>Room</th>
                                    <th style="width: 10px;">No. of Students</th>
                                    <th style="width: 10px;">Limit</th>
                                    <th>Set</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php

                                        $Nsql=mysqli_query($conn, "SELECT
                                                                    `limit_student`.`id`,
                                                                    `enrolled_subject`.`userid`,
                                                                    `limit_student`.`sem_id`,
                                                                    `limit_student`.`school_yr_id`,
                                                                    `schedule`.`subject_title`,
                                                                    `schedule`.`room`,
                                                                    `schedule`.`course_num`,
                                                                    Count(`enrolled_subject`.`schedule_id`) AS `total`,
                                                                    `limit_student`.`limit_student`,
                                                                    `major`.`major`
                                                                    FROM
                                                                    `enrolled_subject`
                                                                    Right Join `limit_student` ON `enrolled_subject`.`schedule_id` = `limit_student`.`schedule_id` AND `limit_student`.`school_yr_id` = `enrolled_subject`.`school_yr_id` AND `limit_student`.`sem_id` = `enrolled_subject`.`sem_id`
                                                                    Right Join `schedule` ON `schedule`.`schedule_id` = `limit_student`.`schedule_id` AND `schedule`.`school_yr_id` = `limit_student`.`school_yr_id` AND `schedule`.`sem_id` = `limit_student`.`sem_id`
                                                                    Inner Join `major` ON `major`.`major_id` = `schedule`.`major_id`
                                                                    Inner join subject on subject.subjects_id=schedule.subjects
                                                                   
                                                                    WHERE
                                                                    `limit_student`.`school_yr_id` =  '". $syRow['school_yr_id']."' AND
                                                                    `limit_student`.`sem_id` =  '". $semRow['sem_id']."' AND
                                                                    subject.program_id = '".$srow['major_id']."' 
                                                                  GROUP BY
                                                                    `schedule`.`room`,
                                                                    `schedule`.`subject_title`,
                                                                    `schedule`.`major_id`
                                                            ");
                                    while($Nrow=mysqli_fetch_array($Nsql)) { ?>
                                      <tr>
                                        <td><?php echo $Nrow['major']; ?></td> 
                                        <td><?php echo $Nrow['course_num']; ?></td> 
                                        <td><?php echo $Nrow['subject_title']; ?></td> 
                                        <td><?php echo $Nrow['room']; ?></td> 
                                        <td><strong><?php echo $Nrow['total']; ?></strong></td>
                                        <form action="limit_sched.php<?php echo '?id='.$Nrow['id']; ?>" method="POST">
                                        <td><input type="text" class="form-control" name="limiter" value="<?php echo $Nrow['limit_student']; ?>"></td>
                                        <td><button class="btn btn-primary btn-sm" name="limit">Set</button></td>
                                        </form>
                                      </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                          
                          </div>
                        <?php } ?>
                    </div>
                </div>
    </div>

</body>
</html>
<script src="dist/js/fs-modal.min.js"></script>
<?php include('tableScript.php'); ?>


<script type="text/javascript">
 $(document).ready(function() {
    $('table.display').DataTable();
} );   
</script>
