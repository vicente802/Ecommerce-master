    <div class="modal fade modal-fullscreen" id="addsub_<?php echo $rowrow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 100%;">
            <div class="modal-content" >
                <div class="modal-header">
                    <center><h5 class="modal-title" id="myModalLabel">Adding subject</h5></center>
                </div>
                <div class="modal-body">
              <div class="container-fluid">
                              
                              <table id="myTable" class="display table table-responsive-md table-hover table table-bordered"  style="font-size: 12px;">
                                <thead>
                                  <tr class="table100-head">
                                    <th >Time (Saturday)</th>
                                    <th >Course no.</th>
                                    <th >Descriptive Title</th>
                                    <th >Instructor</th>
                                    <th >Units</th>
                                    <th >Room</th>
                                    <th >Select </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $id = $_GET['id'];

                                        $enrolSql=mysqli_query($conn, "SELECT
                                                                      `limit_student`.`id`,
                                                                      `enrolled_subject`.`userid`,
                                                                      `limit_student`.`sem_id`,
                                                                      `limit_student`.`school_yr_id`,
                                                                      `schedule`.`room`,
                                                                      `schedule`.`time_in`,
                                                                      `schedule`.`time_out`,
                                                                      `schedule`.`course_num`,
                                                                      `schedule`.`subject_title`,
                                                                      `instructor`.`fullname`,
                                                                      `schedule`.`units_lec`,
                                                                      `schedule`.`units_lab`,
                                                                      `subject`.`descriptive_title`,
                                                                      `schedule`.`schedule_id`,
                                                                  Count(`enrolled_subject`.`schedule_id`),
                                                                      `limit_student`.`limit_student`
                                                                  FROM
                                                                      `enrolled_subject`
                                                                  Right Join `limit_student` ON `enrolled_subject`.`schedule_id` = `limit_student`.`schedule_id` AND `limit_student`.`school_yr_id` = `enrolled_subject`.`school_yr_id` AND `limit_student`.`sem_id` = `enrolled_subject`.`sem_id`
                                                                  Right Join `schedule` ON `schedule`.`schedule_id` = `limit_student`.`schedule_id` AND `schedule`.`school_yr_id` = `limit_student`.`school_yr_id` AND `schedule`.`sem_id` = `limit_student`.`sem_id`
                                                                  RIGHT JOIN subject on subject.subjects_id=schedule.subjects
                                                                  RIGHT JOIN instructor on instructor.instructor_id=schedule.instructor_id 
                                                                  Inner Join `major` ON `schedule`.`major_id` = `major`.`major_id`
                                                                  Inner Join `app_for_admission` ON `major`.`major_id` = `app_for_admission`.`major`
                                                                  WHERE app_for_admission.userid = '$id' AND
                                                                    `limit_student`.`sem_id` =  '". $semRow['sem_id']."' AND
                                                                    `limit_student`.`school_yr_id` =  '". $syRow['school_yr_id']."'
                                                                  GROUP BY
                                                                    `schedule`.`room`,
                                                                    `schedule`.`subject_title`,
                                                                    `schedule`.`course_num`
                                                                  HAVING
                                                                     Count(`enrolled_subject`.`schedule_id`) < 1
                                                                          ");
                                        $padas = 1;

                                        while($enrollmentRow=mysqli_fetch_array($enrolSql)){
                                          ?>
                                          <tr>
                                            <td><?php echo $enrollmentRow['time_in']; ?>-<?php echo $enrollmentRow['time_out']; ?></td>
                                            <td ><?php echo $enrollmentRow['course_num']; ?></td>
                                            <td ><?php echo $enrollmentRow['descriptive_title']; ?></td>
                                            <td ><?php echo $enrollmentRow['fullname']; ?></td>
                                            <td ><?php echo $enrollmentRow['units_lec']; ?></td>
                                            <td ><?php echo $enrollmentRow['room']; ?></td>
                                            <td >
                                              <form action="subject-selection.php<?php echo '?id='.$rowrow['userid']; ?>" method="POST" id="form1" >
                                                
                                                <input type="checkbox" name="schedule[]" class="success" value="<?php echo $enrollmentRow['schedule_id'];?>" >

                                                <input type="hidden" name="subject" id="sched2" class="success" value="<?php //echo $enrollmentRow['descriptive_title'];?>" >
                                                <input type="hidden" name="school_yr_id" value="<?php echo $syRow['school_yr_id'];?>">
                                                <input type="hidden" name="course" value="<?php echo $courseRow['program_id'];?>" >
                                                <input type="hidden" name="semester" value="<?php echo $semRow['sem_id'];?>" >
                                                <input type="hidden" name="AY" value="<?php echo $courseRow['AY'];?>" >
                                            </td>
                                        </tr>
                                      <?php $padas++; } ?>
                                    </tbody>
                                  </div>  
                              </div>
                          </div>
                      </div>
                  </table>
            </div>                 
              </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm" name="add_btn"><i class="fa fa-plus-circle"></i> Add</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              </form>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">

 $(document).ready(function() {
  $("input[name='schedule[]']").change(function(){
    var maxAllowed = 1;
      var cnt = $("input[name='schedule[]']:checked").length;
        if (cnt > maxAllowed) {
          $(this).prop("checked","");
            alert("Maximum of " + maxAllowed + " subject can be add!");

        }
  });
 });
</script>