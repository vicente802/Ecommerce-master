<?php 
    $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
    $syRow = mysqli_fetch_array($query);

    $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
    $semRow = mysqli_fetch_array($semquer);
?>
  <div class="modal fade modal-fullscreen" id="major-modal-1" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding Major</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid box">
              <form method="post" action="list-major_db.php">
                 <div class="container-fluid">  
                   <div class="container-fluid">
                    <br>
                     <input type="hidden" name="major_id" class="form-control" id="major_id"> 

                     <div class="row ">
                        <div class="col-sm-10 ">
                            <?php
                              $subjsql=mysqli_query($conn,"select * from courses where program_id='1'");
                              $subjectrow=mysqli_fetch_array($subjsql); ?>

                              <input style="color: black; font-size: 20px;" name="program" id="program" value="<?php echo $subjectrow['program_id']; ?>" type="hidden" /><?php echo $subjectrow['program']; ?>
                        </div>                 
                     </div>

                     <div class="row ">
                        <div class="col-sm-12 inputBox">
                          <input type="text" class="form-control" name="major" id="major_here" onkeyup="validateMajor()" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" required />
                        </div>                                
                     </div>
                     <div>
                      <input type="hidden" name="semester" id="semester" value="<?php echo $semRow['sem_id']; ?>" />
                    </div>
                     <br>  

                   </div>
                 </div>  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="btnsub" id="btnsub" class="btn btn-success btn-sm"><i class="fa fa-save"></i> | Save</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> | Cancel</button>
                </div>
                 </form>
              </div> 
            </div>
          </div>
        </div>
      </div>

<script type="text/javascript">
      $(function() {

         var here_major = false;

         $("#major_here").focusout(function() {
            check_major();
         });

         function check_major() {
            var major = $("#major_here").val();

            if (!major == 0) {
               $("#major_error_message0").hide();
               $("#major_here").css("border-bottom","2px solid #77b300");
            } else {
               //$("#uname_error_message0").html("Should contain only Characters");
               $("#major_error_message0").show();
               $("#major_here").css("border-bottom","2px solid #e60000");
               here_major = true;
            }
         }

         $("#btnsub").submit(function() {
             var here_major = false;

            check_major();


            if (here_major === false) {
               return true;
            } else {
               alert("All forms must be valid before submitting");
               return false;
            }

         });
      });
</script>



<!---------------------------------- MaEd ------------------------------------------->

  <div class="modal fade modal-fullscreen" id="major-modal-2" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding Major</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid box">
              <form method="post" action="list-major_db.php">
                 <div class="container-fluid">  
                   <div class="container-fluid">
                    <br>
                     <input type="hidden" name="major_id" class="form-control" id="major_id"> 

                     <div class="row ">
                        <div class="col-sm-10 ">
                            <?php
                              $subjsql=mysqli_query($conn,"select * from courses where program_id='2'");
                              $subjectrow=mysqli_fetch_array($subjsql); ?>

                              <input style="color: black; font-size: 20px;" name="program" id="program" value="<?php echo $subjectrow['program_id']; ?>" type="hidden" /><?php echo $subjectrow['program']; ?>
                        </div>                 
                     </div>

                     <div class="row ">
                        <div class="col-sm-12 inputBox">
                          <input type="text" class="form-control" name="major" id="major_here01" onkeyup="validateMajor()" required onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" />
                        </div>                                
                     </div>
                     <div>
                      <input type="hidden" name="semester" id="semester" value="<?php echo $semRow['sem_id']; ?>" />
                    </div>
                     <br>  

                   </div>
                 </div>  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="btnsub" id="btnsub" class="btn btn-success btn-sm"><i class="fa fa-save"></i> | Save</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> | Cancel</button>
                </div>
                 </form>
              </div> 
            </div>
          </div>
        </div>
      </div>

<script type="text/javascript">
      $(function() {

         var here_major = false;

         $("#major_here01").focusout(function() {
            check_major();
         });

         function check_major() {
            var major = $("#major_here01").val();

            if (!major == 0) {
               $("#major_error_message0").hide();
               $("#major_here01").css("border-bottom","2px solid #77b300");
            } else {
               //$("#uname_error_message0").html("Should contain only Characters");
               $("#major_error_message0").show();
               $("#major_here01").css("border-bottom","2px solid #e60000");
               here_major = true;
            }
         }

         $("#btnsub").submit(function() {
             var here_major = false;

            check_major();


            if (here_major === false) {
               return true;
            } else {
               alert("All forms must be valid before submitting");
               return false;
            }

         });
      });
</script>