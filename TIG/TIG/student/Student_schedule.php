<?php include('head.php'); ?>
<div class="wrapper">
<?php include('navbar.php'); ?>
<div class="container-fluid">

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
                          <h3><i class="far fa-calendar-alt"></i> Enroll Subjects</h3>
                        </ul>

                    </div>
                </div>
            </nav>

                          <div class="row">
                          </div><br>
                            <div>
                              <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 15px;">
                                <thead>
                                  <tr>
                                    <th>Course no.</th>
                                    <th>Descriptive Title</th>
                                    <th>Instructor</th>
                                    <th>Time In & Time Out</th>
                                    <th>Room</th>
                                    <th>Section</th>
                                    <th>Semister</th>
                                    <th>Select</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $query=mysqli_query($conn,"select * from schedule 
                                      left join subject on subject.subjects_id=schedule.subjects_id
                                      left join major on subject.program_id=major.major_id 
                                      left join instructor on instructor.instructor_id=schedule.instructor_id
                                      left join sy on sy.school_yr_id=schedule.school_yr_id
                                      left join section on section.section_id=schedule.section
                                      where schedule.schedule_id ");

                                    while($subjrow=mysqli_fetch_array($query)){
                                      ?>
                                      <tr>
                                        <td><?php echo $subjrow['course_no']; ?></td>
                                        <td><?php echo $subjrow['descriptive_title']; ?></td>
                                        <td><?php echo $subjrow['fullname']; ?></td>
                                        <td><?php echo $subjrow['time']; ?> - <?php echo $subjrow['time2']; ?></td>
                                        <td><?php echo $subjrow['room']; ?></td>
                                        <td><?php echo $subjrow['section']; ?></td>
                                        <td><?php echo $subjrow['semister']; ?></td>     
                                        <td><input type="checkbox"></td>                 
                                      </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                              </div>
                    </div>
                </div>

            </div>  
        </div>
    </div>
</div>
    
    <script src="dist/js/fs-modal.min.js"></script>
    <?php include('tableScript.php'); ?>

</body>
</html>

<script type="text/javascript">
 $(document).ready(function() {
    $('table.display').DataTable();
} );   
</script>

<!--
<script type="text/javascript">
  function show_courses(){
      var select_subject=$('#program_id').val();
     
    if(select_subject == '1') {
        $('#1').show();
        $('#sched-1').show();
        $('#sched-2').hide();
        $('#sem').show(); 
        $('#2').hide();
        $('#entry1').show(); 
        $('#entry2').hide();
        $('#buttonsub').show();
        $('#buttonsub2').hide();
        document.getElementById("2").disabled = true; 

    }else if(select_subject == '2') {
        $('#1').hide();
        $('#2').show();
        $('#sched-2').show();
        $('#sched-1').hide();
        $('#sem').show();
        $('#entry1').hide(); 
        $('#entry2').show();        
        $('#buttonsub').hide();
        $('#buttonsub2').show();
        document.getElementById("1").disabled = true; 

    }

}
</script>



<script type="text/javascript">

  function show_courses(){
    var selectCourse = document.getElementById("program_id").value;
    console.log(selectCourse);
  }
  show_courses();
</script>  