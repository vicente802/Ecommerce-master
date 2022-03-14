<link rel="stylesheet" type="text/css" href="style1.css">
 <head>
    <style type="text/css">
        .error_form0
            {
                top: 12px;
                color: rgb(216, 15, 15);
                font-size: 13px;
                font-family: Helvetica;
            }
        #pic 
            {
                height: 30px; width: 30px;
            }    
    </style>
</head>
<!---------- Add new subject MSE modal ------->
    <?php 
      $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
      $syRow = mysqli_fetch_array($query);

      $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
      $semRow = mysqli_fetch_array($semquer);
    ?>

<div class="modal fade modal-fullscreen" id="add_submodal" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
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
              <form method="post" action="subject_db.php" id="submit_form">

                  <div class="box2"> 
                  <div class="row" style="margin-top: -18px; margin-bottom: 28px;">
                          <?php
                            $coursesql=mysqli_query($conn,"select * from courses where program_id = '1'");
                            $courserow=mysqli_fetch_array($coursesql);
                              ?>
                          <input type="hidden" name="course" id="course" value="1">         
                  </div> 
                   <div class="row" style="margin-bottom: 25px; margin-top: 8px;">
                     <div class="col-sm-12"> 
                        <select id="major000" class="form-control" name="major" required>
                          <option name="" id="selector" style="display: none;" value="">SELECT MAJOR</option>
                          <?php
                            $subjsql=mysqli_query($conn,"select * from major where program_id = '1' ");
                            while($subjectrow=mysqli_fetch_array($subjsql)){
                              ?>
                                <option value="<?php echo $subjectrow['major_id']; ?>"><?php echo $subjectrow['major']; ?></option>
                              <?php
                            }
                          ?>
                        </select>
                    
                     </div>
                   </div>

                   <div class="row" >
                     <div class="col-sm-4"> 
                      <input type="text"  name="course_no" id="course_no000" class="form-control" placeholder="Course no." required="" />
                    
                     </div>

                     <div class="col-sm-8">
                      <input type="text"  name="descriptive_title" id="descriptive_title000" class="form-control" placeholder="Descriptive tittle" required="" />
                       
                     </div>
                   </div>
                   <br>
                   <div class="row">
                     <div class="col-sm">
                      <input type="text" name="unit_lec" id="unit_lec000" class="form-control" placeholder="Units lec" pattern="[0-9]"  required="" />
                
                    </div>
                     <div class="col-sm">
                      <input type="text"  name="unit_lab" id="unit_lab000" class="form-control" placeholder="Units lab" pattern="[0-9]" title="One digit only"  required="" />
                       
                    </div>
                     <div class="col-sm">
                      <input type="text" name="hours" id="hours000" class="form-control" placeholder="Hours"  />
                      
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
         $("#major_error_message0").hide();
         $("#course_no_error_message0").hide(); 
         $("#title_error_message0").hide();
         $("#lec_error_message0").hide();
         $("#lab_error_message0").hide();
         $("#hours_error_message0").hide();

         var error_major = false;
         var course_no = false;
         var error_title = false;
         var error_lec = false;
         var error_lab = false;
         var error_hours = false;

         $("#major000").focusout(function() {
            check_major();
         });
         $("#course_no000").focusout(function() {
            check_co_no();
         });
         $("#descriptive_title000").focusout(function() {
            check_title();
         });
         $("#unit_lec000").focusout(function() {
            check_lec();
         });
         $("#unit_lab000").focusout(function() {
            check_lab();
         });
         $("#hours000").focusout(function() {
            check_hours();
         });

         function check_major() {
            var major = $("#major000").val();
            var selector = $("#selector").val();

            if (!major.length == '') {
               $("#major_error_message0").hide();
               $("#major000").css("border-bottom","2px solid #77b300");
            } else {
               //$("#uname_error_message0").html("Should contain only Characters");
               $("#major_error_message0").show();
               $("#major000").css("border-bottom","2px solid #e60000");
               error_major = true;
            }
         }

         function check_co_no() {
            var course_no = $("#course_no000").val()
            if (!course_no.length == 0) {
               $("#course_no_error_message0").hide();
               $("#course_no000").css("border-bottom","2px solid #77b300");
            } else {
               //$("#fname_error_message0").html("Should contain only Characters");
               $("#course_no_error_message0").show();
               $("#course_no000").css("border-bottom","2px solid #e60000");
               course_no = true;
            }
         }

         function check_title() {
            var title = $("#descriptive_title000").val()
            if (!title.length == 0) {
               $("#title_error_message0").hide();
               $("#descriptive_title000").css("border-bottom","2px solid #77b300");
            } else {
               //$("#fname_error_message0").html("Should contain only Characters");
               $("#title_error_message0").show();
               $("#descriptive_title000").css("border-bottom","2px solid #e60000");
               error_title = true;
            }
         }

         function check_lec() {
            var pattern = /^[0-9]$/;
            var lec = $("#unit_lec000").val()
            if (pattern.test(lec) && lec !== '') {
               $("#lec_error_message0").hide();
               $("#unit_lec000").css("border-bottom","2px solid #77b300");
            } else if (lec.match(/^[A-Za-z]*$/)) {
               $("#lec_error_message0").show();
               $("#unit_lec000").css("border-bottom","2px solid #e60000");
               error_lec = true;
            }else{
               $("#lec_error_message0").show();
               $("#unit_lec000").css("border-bottom","2px solid #e60000");
               error_lec = true;            
             }
         }

         function check_lab() {
            var pattern = /^[0-9]$/;
            var lab = $("#unit_lab000").val()
            if (pattern.test(lab) && lab !== '') {
               $("#lab_error_message0").hide();
               $("#unit_lab000").css("border-bottom","2px solid #77b300");
            } else if (lab.match(/^[A-Za-z]*$/)) {
               $("#lab_error_message0").show();
               $("#unit_lab000").css("border-bottom","2px solid #e60000");
               error_lab = true;
            } else{
               $("#lab_error_message0").show();
               $("#unit_lab000").css("border-bottom","2px solid #e60000");
               error_lab = true;            }
         }

         function check_hours() {
            var pattern = /^[0-9]$/;
            var hours = $("#hours000").val()
            if (pattern.test(hours) && hours !== '') {
               $("#hours_error_message0").hide();
               $("#hours000").css("border-bottom","2px solid #77b300");
            } else if (hours.match(/^[A-Za-z]*$/)) {
               $("#hours_error_message0").show();
               $("#hours000").css("border-bottom","2px solid #e60000");
               error_hours = true;
            } else{
               //$("#fname_error_message0").html("Should contain only Characters");
               $("#hours_error_message0").show();
               $("#hours000").css("border-bottom","2px solid #e60000");
               error_hours = true;
            }
         }

         $("#submit_form").submit(function() {
             var error_major = false;
             var course_no = false;
             var error_title = false;
             var error_lec = false;
             var error_lab = false;
             var error_hours = false;

            check_major();
            check_co_no();
            check_title();
            check_lec();
            check_lab();
            check_hours();

            if (error_major === false && course_no === false && error_title === false && error_lec === false && error_lab === false && error_hours === false) {
               return true;
            } else {
               alert("All forms must be valid before submitting");
               return false;
            }

         });
      });
</script>
