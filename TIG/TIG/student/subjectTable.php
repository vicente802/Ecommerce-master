              	<div id="1" class="tabdiv">
                    <div class="container">
                    	<ul class="nav nav-tabs active" id="tabs" >
                          <?php
                            $counter = 1;

                            $subjsql=mysqli_query($conn,"select * FROM major LEFT JOIN subject on subject.subjects_id=major.major_id LEFT JOIN courses on courses.program_id=subject.subjects_id WHERE major.program_id='1' ORDER BY major_id ASC");
                            while($subjectrow=mysqli_fetch_array($subjsql)){ ?>

		                        <li class="nav-item" name="tab">
		                          <a class="nav-link" data-toggle="tab" class="tab" name="tab" href="#tab-<?= $counter++; ?>"><?php echo $subjectrow['major']; ?></a>
		                        </li>
                           <?php } ?>
                    	</ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                      <?php
                        $counter2 = 1;

                        $subjsql2=mysqli_query($conn,"select * FROM major LEFT JOIN subject on subject.subjects_id=major.major_id LEFT JOIN courses on courses.program_id=subject.subjects_id  WHERE major.program_id='1' ORDER BY major_id ASC");

                        while($srow=mysqli_fetch_array($subjsql2)) { ?>
                           
                        <div id="tab-<?= $counter2++; ?>" class="container tab-pane"><br>
                          <div class="row">
                          </div><br>
                          	<div>
                              <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 15px;">
                                <thead>
                                  <tr>
                                    <th>Course no.</th>
                                    <th>Descriptive Title</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th>Instructor</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $query=mysqli_query($conn,"select * from subject
                                      left join schedule on subject.subjects_id=schedule.subjects
                                      left join major on subject.subjects_id=major.major_id 
                                      left join courses on courses.program_id=subject.subjects_id
                                      left join instructor on instructor.instructor_id=schedule.instructor_id 
                                      where subject.program_id = '".$srow['major_id']."' ");
                                    while($subjrow=mysqli_fetch_array($query)){
                                      ?>
                                      <tr>
                                        <td><?php echo $subjrow['course_no']; ?></td>
                                        <td><?php echo $subjrow['descriptive_title']; ?></td>
                                        <td><?php echo $subjrow['time_in']; ?> - <?php echo $subjrow['time_out']; ?></td>
                                        <td><?php echo $subjrow['room']; ?></td>  
                                        <td><?php echo $subjrow['fullname']; ?></td>                         
                                      </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                              </div>
                          </div>
   						         <?php } ?>
                    </div>
                </div>
            </div>

<script type="text/javascript">
  $(document).ready(function() {
      var table = $('#myTable1').DataTable();
       
      $('#myTable1 tbody').on('click', 'tr', function () {
          var data = table.row( this ).data();
          alert( 'You clicked on '+data[0]+'\'s row' );
      } );
  } );
</script>

<!------------------------------------------------------------------------- MAED ------------------------------------------------------------->


                <div id="2" class="tabdiv" style="display: none;">
                    <div class="container">
                      <ul class="nav nav-tabs"  >
                          <?php
                            $counters = 1;

                            $subjsql2=mysqli_query($conn,"select * FROM major LEFT JOIN subject on subject.subjects_id=major.major_id LEFT JOIN courses on courses.program_id=subject.subjects_id WHERE major.program_id='2' ORDER BY major_id ASC");
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

                        $subjsql2=mysqli_query($conn,"select * FROM major LEFT JOIN subject on subject.subjects_id=major.major_id LEFT JOIN courses on courses.program_id=subject.subjects_id WHERE major.program_id='2' ORDER BY major_id ASC");

                        while($srow2=mysqli_fetch_array($subjsql2)) { ?>
                           
                        <div id="tabs-<?= $counters2++; ?>" class="container tab-pane"><br>
                          <div class="row">
                             </div><br>
                            <div>
                              <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 15px;">
                                <thead>
                                  <tr>
                                    <th>Course no.</th>
                                    <th>Descriptive Title</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th>Instructor</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $query2=mysqli_query($conn,"select * from subject
                                      left join schedule on subject.subjects_id=schedule.subjects
                                      left join major on subject.subjects_id=major.major_id 
                                      left join courses on courses.program_id=subject.subjects_id
                                      left join instructor on instructor.instructor_id=schedule.instructor_id 
                                      where subject.program_id = '".$srow2['major_id']."' ");
                                    while($subjrow2=mysqli_fetch_array($query2)){
                                      ?>
                                      <tr>
                                        <td><?php echo $subjrow2['course_no']; ?></td>
                                        <td><?php echo $subjrow2['descriptive_title']; ?></td>
                                        <td><?php echo $subjrow2['time_in']; ?> - <?php echo $subjrow2['time_out']; ?></td>
                                        <td><?php echo $subjrow2['room']; ?></td>  
                                        <td><?php echo $subjrow2['fullname']; ?></td>                      
                                      </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                              </div>
                          </div>
                        <?php } ?>
                    </div>
                </div>
            </div>