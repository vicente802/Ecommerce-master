<script type="text/javascript">

window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light2",
    animationEnabled: true, 
    exportEnabled: true,
    title:{
      text: "Master of Science in Education",
      fontSize: 25,
      fontFamily: "COMPANY"              
    },
          data: [{
            type: "column",
            dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?> 
          }]
        });
  chart.render();

  var chart1 = new CanvasJS.Chart("chartContainer2", {
    theme: "light1",
    animationEnabled: true, 
    exportEnabled: true,
    title:{
      text: "Master of Arts in Education",
      fontSize: 25,
      fontFamily: "COMPANY"                  
    },
    legend: {
      maxWidth: 350,
      itemWidth: 120
    },
          data: [{
            type: "pie",
            showInLegend: true,
            legendText: "{label}: {y}",
            startAngle: 160,
            indexLabelFontSize: 17, 
            toolTipContent: "<b>{label}:</b> {y}",
            indexLabel: "{label}: {y}",
            dataPoints: <?php echo json_encode($data1, JSON_NUMERIC_CHECK); ?> 
          }]
        });
  chart1.render();

}
</script>


    <script type="text/javascript">
        function loadDoc() {

            setInterval(function(){

              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("enrolled").innerHTML = this.responseText;
                }
              };
              xhttp.open("GET", "count_enrolled.php", true);
              xhttp.send(); 
            },1000)

        }
        loadDoc();
    </script>
    <script type="text/javascript">
        function loadDoc() {

            setInterval(function(){

              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("pending").innerHTML = this.responseText;
                }
              };
              xhttp.open("GET", "count_pending.php", true);
              xhttp.send(); 
            },1000)

        }
        loadDoc();
    </script>    
<style type="text/css">   
.thisline{
    width: 240px;
    height: 10px;
    border-bottom: 1px solid black;
    }
.inputLine {
    border: 0;
    border-bottom: 1px solid #000;
    width: 100%;
}    
</style>
  <div class="modal fade " id="view_<?php echo $trow['userid']; ?>" tabindex="-1" role="dialog" aria-spanledby="modalLargespan">
    <div class="modal-dialog modal-lg" style="width: 100%;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargespan"> Student Info</h4> </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">

          <?php
              $sq=mysqli_query($conn,"select * from app_for_admission 
                left join student on student.userid=app_for_admission.userid
                left join user on user.userid=app_for_admission.userid 
                    left join courses on courses.program_id=app_for_admission.course
                    left join major on major.major_id=app_for_admission.major
                where app_for_admission.userid ='".$trow['userid']."'");
              $edrow01=mysqli_fetch_array($sq);
          ?>

                <form method="POST" action="update_status.php?id=<?php echo $trow['userid']; ?>">
                        <div class="container-fluid">
                        <div>
                        <?php  
                                $pic=mysqli_query($conn,"select * from student where userid='".$trow['userid']."'");   
                                $prow=mysqli_fetch_array($pic);
                        ?>
                            <center><img src="../<?php if(empty($prow['image'])){echo "./upload/profile.jpg";}else{echo $prow['image'];} ?>" id="logo" class="rounded-circle" alt="Circular Image" style="height: 250px;"></center><br>
                        </div>
                        <br>
                        <div class="row"> 
                            <div class="col-sm-4">
                                <input type="text" style="background-color: white;"  class="form-control inputLine" name="student_id" id="student_id_val" value="<?php echo ($edrow01['student_id']); ?>" readonly/>
                                <center><span><small>Student ID</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="lastname" value="<?php echo ($edrow01['lastname']); ?>" readonly />
                                <center><span><small>Lastname</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="firstname" value="<?php echo ($edrow01['firstname']); ?>" readonly />
                                <center><span><small>Firstname</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="middlename" value="<?php echo ($edrow01['middlename']); ?>" readonly />
                                <center><span><small>Middlename</small></span></center>
                            </div>
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-2">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="age" value="<?php echo ($edrow01['age']); ?>" readonly />
                                <center><span><small>Age</small></span></center>
                            </div>

                            <div class="col-sm-3">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="sex" value="<?php echo ($edrow01['sex']); ?>" readonly />
                            <center><span><small>Sex</small></span></center>                            
                            </div>

                            <div class="col-sm-3">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="civil_status" value="<?php echo ($edrow01['civil_status']); ?>" readonly />
                                <center><span><small>Civil Status</small></span></center>  
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="religion" value="<?php echo ($edrow01['religion']); ?>" readonly />
                                <center><span><small>Religion</small></span></center>
                            </div>                            
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" onfocus="(this.type='date')" style="background-color: white;"  class="form-control inputLine" name="date_of_birth" value="<?php echo ($edrow01['date_of_birth']); ?>" readonly />
                                <center><span><small>Date of Birth</small></span></center>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="background-color: white; text-transform:capitalize;" class="form-control inputLine" name="place_of_birth" value="<?php echo ($edrow01['place_of_birth']); ?>" readonly / >
                                <center><span><small>Place of Birth</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                            <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="permanent_address" value="<?php echo ($edrow01['permanent_address']); ?>" readonly />
                            <center><span><small>Permanent Address</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="name_of_parent" value="<?php echo ($edrow01['name_of_parent']); ?>" readonly />
                                <center><span><small>Name of parent</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="parent_occupation" value="<?php echo ($edrow01['parent_occupation']); ?>" readonly />
                                <center><span><small>Parent Occupation</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: white;"  class="form-control inputLine" name="parent_contact_no" value="<?php echo ($edrow01['parent_contact_no']); ?>" readonly />
                                <center><span><small>Parent Contact no.</small></span></center>
                            </div>                            
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="name_of_guardian" value="<?php echo ($edrow01['name_of_guardian']); ?>" readonly />
                                <center><span><small>Name of guardian</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="guardian_occupation" value="<?php echo ($edrow01['guardian_occupation']); ?>" readonly />
                                <center><span><small>Guardian Occupation</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: white;"  class="form-control inputLine" name="guardian_contact_no" value="<?php echo ($edrow01['guardian_contact_no']); ?>" readonly />
                                <center><span><small>Guardian Contact no.</small></span></center>
                            </div>                            
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" style="text-transform:capitalize; background-color: white;" class="form-control inputLine"  name="if_married_spouse_name" value="<?php echo ($edrow01['if_married_spouse_name']); ?>" readonly />
                                <center><span><small>If married, name of spouse</small></span></center>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="text-transform:capitalize; background-color: white;"  class="form-control inputLine" name="spouse_occupation" value="<?php echo ($edrow01['spouse_occupation']); ?>" readonly />
                                <center><span><small>Spouse Occupation</small></span></center>
                            </div>                             
                        </div>
                        <br>
                             
                        <div class="row">
                            <div class="col-sm-12">
                            <input type="email" style="background-color: white;" class="form-control inputLine"  name="email_address" value="<?php echo ($edrow01['email_address']); ?>" readonly />
                            <center><span><small>Email Address</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                             <div class="col-sm-6">
                            <input type="text" style="background-color: white;" class="form-control inputLine"  name="course" value="<?php echo ($edrow01['program']); ?>" readonly />
                            <center><span><small>Course</small></span></center>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="background-color: white;" class="form-control inputLine"  name="major" value="<?php echo ($edrow01['major']); ?>" readonly />
                            <center><span><small>Major</small></span></center>
                            </div>
                        </div>                        
                        <br>
                            <!-- Modal footer -->
                          <div class="modal-footer">
                            
                              <input type="hidden" name="status" value="Accepted">
                                <button class="btn btn-success btn-sm" type="submit" name="statsBtn" style="float: right;"><i class="far fa-check-circle"></i> | Accept</button>
                                <button class="btn btn-warning btn-sm" type="submit" name="statusBtn" style="float: right;"><i class="far fa-times-circle"></i> | Reject</button>
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                            
                          </div> 
                 </div>
               </div>   
            </form>
          </div> 
        </div>
      </div>
    </div>
  </div>  
