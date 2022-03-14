<?php 
      $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
      $syRow = mysqli_fetch_array($query);

      $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
      $semRow = mysqli_fetch_array($semquer);
?>

<div class="modal fade modal-fullscreen" id="add_submodal1" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog modal-dialog-centered modal-md" style="width:100%">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Add new subject</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">

          <div class="tab-content">
          <div id="home" class="container tab-pane active">
              <form method="post" action="subject_db.php" id="submit_form2">

                  <div class="box2"> 
                  <div class="row" style="margin-top: -18px; margin-bottom: 28px;">
                          <?php
                            $coursesql2=mysqli_query($conn,"select * from courses where program_id = '2'");
                            $courserow2=mysqli_fetch_array($coursesql2);
                              ?>
                          <input type="hidden" name="course" id="course2" value="2">         
                  </div> 
                   <div class="row" style="margin-bottom: 25px; margin-top: 8px;">
                     <div class="col-sm-12"> 
                        <select id="major000" class="form-control" name="major" required>
                          <option name="" id="selector2" style="display: none;" value="">SELECT MAJOR</option>
                          <?php
                            $subjsql2=mysqli_query($conn,"select * from major where program_id = '2' ");
                            while($subjectrow2=mysqli_fetch_array($subjsql2)){
                              ?>
                                <option value="<?php echo $subjectrow2['major_id']; ?>"><?php echo $subjectrow2['major']; ?></option>
                              <?php
                            }
                          ?>
                        </select>
                         <center><span class="error_form0" id="major_error_message0"></span></center>
                     </div>
                   </div>

                   <div class="row" >
                     <div class="col-sm-4 inputBox02"> 
                      <input type="text"  name="course_no" id="course_no0002" class="form-control" placeholder="Course no." required="" />
                       <center><span class="error_form0" id="course_no_error_message02"></span></center>
                     </div>

                     <div class="col-sm-8 inputBox02">
                      <input type="text"  name="descriptive_title" id="descriptive_title0002" class="form-control" placeholder="Descriptive tittle" required="" />
                       <center><span class="error_form0" id="title_error_message02"></span></center>
                     </div>
                   </div>
                   <br>
                   <div class="row">
                     <div class="col-sm inputBox0">
                      <input type="text" name="unit_lec" id="unit_lec0002" class="form-control" placeholder="Units lec" pattern="[0-9]" title="Must only contain numbers only" required="" />
                       <center><span class="error_form0" id="lec_error_message02"></span></center>
                    </div>
                     <div class="col-sm inputBox0">
                      <input type="text"  name="unit_lab" id="unit_lab0002" class="form-control" placeholder="Units lab" pattern="[0-9]" title="One digit only"  required="" />
                       <center><span class="error_form0" id="lab_error_message02"></span></center>
                    </div>
                     <div class="col-sm inputBox0">
                      <input type="text" name="hours" id="hours0002" class="form-control" placeholder="Hours"  />
                       <center><span class="error_form0" id="hours_error_message02"></span></center>
                    </div>

                     <div>
                      <input type="hidden" name="semester" id="semester" value="<?php echo $semRow['sem_id']; ?>" />
                      <input type="hidden" name="school_year" id="school_year" value="<?php echo $syRow['school_yr_id']; ?>" />
                    </div>

                   </div>
                   </div>  
                   <br>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                      <button type="submit" name="btnsub" id="btnsub" class="btn btn-success btn-sm"><i class="fa fa-save"></i> | Save</button>
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
                  </div>
            </form>
          </div>


              </div>
          </div> 
        </div>
      </div>
    </div>
  </div>  

<script type="text/javascript">
      $(function() {
         $("#major_error_message02").hide();
         $("#course_no_error_message02").hide(); 
         $("#title_error_message02").hide();
         $("#lec_error_message02").hide();
         $("#lab_error_message02").hide();
         $("#hours_error_message02").hide();

         var error_major2 = false;
         var course_no2 = false;
         var error_title2 = false;
         var error_lec2 = false;
         var error_lab2 = false;
         var error_hours2 = false;

         $("#major0002").focusout(function() {
            check_major2();
         });
         $("#course_no0002").focusout(function() {
            check_co_no2();
         });
         $("#descriptive_title0002").focusout(function() {
            check_title2();
         });
         $("#unit_lec0002").focusout(function() {
            check_lec2();
         });
         $("#unit_lab0002").focusout(function() {
            check_lab2();
         });
         $("#hours0002").focusout(function() {
            check_hours2();
         });

         function check_major2() {
            var major2 = $("#major0002").val();
            var selector2 = $("#selector2").val();

            if (!major2.length == '') {
               $("#major_error_message02").hide();
               $("#major0002").css("border-bottom","2px solid #77b300");
            } else {
               //$("#uname_error_message0").html("Should contain only Characters");
               $("#major_error_message02").show();
               $("#major0002").css("border-bottom","2px solid #e60000");
               error_major2 = true;
            }
         }

         function check_co_no2() {
            var course_no2 = $("#course_no0002").val()
            if (!course_no2.length == 0) {
               $("#course_no_error_message02").hide();
               $("#course_no0002").css("border-bottom","2px solid #77b300");
            } else {
               //$("#fname_error_message0").html("Should contain only Characters");
               $("#course_no_error_message02").show();
               $("#course_no0002").css("border-bottom","2px solid #e60000");
               course_no2 = true;
            }
         }

         function check_title2() {
            var title2 = $("#descriptive_title0002").val()
            if (!title2.length == 0) {
               $("#title_error_message02").hide();
               $("#descriptive_title0002").css("border-bottom","2px solid #77b300");
            } else {
               //$("#fname_error_message0").html("Should contain only Characters");
               $("#title_error_message02").show();
               $("#descriptive_title0002").css("border-bottom","2px solid #e60000");
               error_title2 = true;
            }
         }

         function check_lec2() {
            var pattern2 = /^[0-9]$/;
            var lec2 = $("#unit_lec0002").val()
            if (pattern2.test(lec2) && lec2 !== '') {
               $("#lec_error_message02").hide();
               $("#unit_lec0002").css("border-bottom","2px solid #77b300");
            } else if (lec2.match(/^[A-Za-z]*$/)) {
               $("#lec_error_message0").show();
               $("#unit_lec0002").css("border-bottom","2px solid #e60000");
               error_lec2 = true;
            }else{
               $("#lec_error_message02").show();
               $("#unit_lec0002").css("border-bottom","2px solid #e60000");
               error_lec2 = true;            
             }
         }

         function check_lab2() {
            var pattern2 = /^[0-9]$/;
            var lab2 = $("#unit_lab0002").val()
            if (pattern2.test(lab2) && lab2 !== '') {
               $("#lab_error_message02").hide();
               $("#unit_lab0002").css("border-bottom","2px solid #77b300");
            } else if (lab2.match(/^[A-Za-z]*$/)) {
               $("#lab_error_message02").show();
               $("#unit_lab0002").css("border-bottom","2px solid #e60000");
               error_lab2 = true;
            } else{
               $("#lab_error_message02").show();
               $("#unit_lab0002").css("border-bottom","2px solid #e60000");
               error_lab2 = true;            }
         }

         function check_hours2() {
            var pattern2 = /^[0-9]$/;
            var hours2 = $("#hours0002").val()
            if (pattern2.test(hours2) && hours2 !== '') {
               $("#hours_error_message02").hide();
               $("#hours0002").css("border-bottom","2px solid #77b300");
            } else if (hours2.match(/^[A-Za-z]*$/)) {
               $("#hours_error_message02").show();
               $("#hours0002").css("border-bottom","2px solid #e60000");
               error_hours = true;
            } else{
               //$("#fname_error_message0").html("Should contain only Characters");
               $("#hours_error_message02").show();
               $("#hours0002").css("border-bottom","2px solid #e60000");
               error_hours2 = true;
            }
         }

         $("#submit_form2").submit(function() {
             var error_major2 = false;
             var course_no2 = false;
             var error_title2 = false;
             var error_lec2 = false;
             var error_lab2 = false;
             var error_hours2 = false;

            check_major2();
            check_co_no2();
            check_title2();
            check_lec2();
            check_lab2();
            check_hours2();

            if (error_major2 === false && course_no2 === false && error_title2 === false && error_lec2 === false && error_lab2 === false && error_hours2 === false) {
               return true;
            } else {
               alert("All forms must be valid before submitting");
               return false;
            }

         });
      });
</script>
