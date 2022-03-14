<?php include('head.php');?>
<?php include('navbar.php');?>
<?php include('edit_info.php');?>

<style type="text/css">   
.thisline{
    width: 240px;
    height: 10px;
    border-bottom: 1px solid black;
    }
.inputLine {
    border: 0;
    border-bottom: 2px solid #006622;
    border-left: 1px solid #006622;
    border-right: 1px solid #006622;
    border-top: 1px solid #006622;
    width: 100%;
    font-size: 15px;
}     
.hid{
    display: none;
}

</style>

<?php 
$student_id = "";
$lastname = "";
$firstname = "";
$middlename = "";
$age = "";
$sex = "";
$civil_status = "";
$religion = "";
$date_of_birth = "";
$place_of_birth = "";
$permanent_address = "";
$name_of_parent = "";
$parent_occupation = "";
$parent_contact_no = "";
$guardian_occupation = "";
$guardian_contact_no = "";
$if_married_spouse_name = "";
$spouse_occupation = "";
$email_address = "";
$dateapplied = "";
                
                $id = $_GET['id'];

                $sq=mysqli_query($conn,"SELECT * from app_for_admission where userid='$id'");
                $row=mysqli_fetch_array($sq); 

?>
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <h5><i class="fab fa-black-tie"></i> Application for Admission</h5>
                        </ul>
                    </div>
                </div>
            </nav>

                    <h3 style="text-align: center; color: green"><i class="far fa-address-book"></i> Edit Registration Form</h3>
                    <hr><br>

<?php if ($enrolledRow['status'] == 'Enrolled') { ?>
                   <form method="POST" action="edit_info.php<?php echo '?id='.$row['userid']; ?>">
                     
                        <div class="row"> 
                            <div class="col-sm-7"></div>
                            <div class="col-sm-3">
                                <input type="text" style="background-color: #fafafa; text-align: center;"  class="form-control inputLine" name="student_id" id="student_id_val" value="<?php echo ($row['student_id']); ?>"/>
                                <center><span><small>Student ID</small></span></center>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" style="background-color: #fafafa; text-align: center;"  class="form-control inputLine" name="type" id="type" value="<?php echo ($row['type']); ?>"/>
                                <center><span><small>Type</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa;"  class="form-control inputLine" name="lastname" value="<?php echo ($row['lastname']); ?>"  />
                                <center><span><small>Lastname</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="firstname" value="<?php echo ($row['firstname']); ?>"  />
                                <center><span><small>Firstname</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="middlename" value="<?php echo ($row['middlename']); ?>"  />
                                <center><span><small>Middlename</small></span></center>
                            </div>
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-3">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="sex" value="<?php echo ($row['sex']); ?>"  />
                            <center><span><small>Sex</small></span></center>                            
                            </div>

                            <div class="col-sm-3">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="civil_status" value="<?php echo ($row['civil_status']); ?>"  />
                                <center><span><small>Civil Status</small></span></center>  
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="text-transform:capitalize;text-align: center;background-color: #fafafa"  class="form-control inputLine" name="religion" value="<?php echo ($row['religion']); ?>"  />
                                <center><span><small>Religion</small></span></center>
                            </div>                            
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <input onchange="getAge0()" type="text" onfocus="(this.type='date')" style="background-color: #fafafa;text-align: center;" id="birthday0" class="form-control inputLine" name="date_of_birth" value="<?php echo ($row['date_of_birth']); ?>"  />
                                <center><span><small>Date of Birth</small></span></center>
                            </div>

                            <div class="col-sm-2">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="age" id="age0" readonly="" value="<?php echo ($row['age']); ?>"  />
                                <center><span><small>Age</small></span></center>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="background-color: #fafafa; text-transform:capitalize;text-align: center;" class="form-control inputLine" name="place_of_birth" value="<?php echo ($row['place_of_birth']); ?>"  />
                                <center><span><small>Place of Birth</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                            <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="permanent_address" value="<?php echo ($row['permanent_address']); ?>"  />
                            <center><span><small>Permanent Address</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="name_of_parent" value="<?php echo ($row['name_of_parent']); ?>"  />
                                <center><span><small>Name of parent</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="parent_occupation" value="<?php echo ($row['parent_occupation']); ?>"  />
                                <center><span><small>Parent Occupation</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="parent_contact_no" value="<?php echo ($row['parent_contact_no']); ?>"  pattern="[0-9]{11}" title="Contact number must be 11 digits"  />
                                <center><span><small>Parent Contact no.</small></span></center>
                            </div>                            
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="name_of_guardian" value="<?php echo ($row['name_of_guardian']); ?>"  />
                                <center><span><small>Name of guardian</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="guardian_occupation" value="<?php echo ($row['guardian_occupation']); ?>"  />
                                <center><span><small>Guardian Occupation</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="guardian_contact_no" value="<?php echo ($row['guardian_contact_no']); ?>" pattern="[0-9]{11}" title="Contact number must be 11 digits"  />
                                <center><span><small>Guardian Contact no.</small></span></center>
                            </div>                            
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" style="background-color: #fafafa;text-align: center;" class="form-control inputLine"  name="if_married_spouse_name" value="<?php echo ($row['if_married_spouse_name']); ?>"  />
                                <center><span><small>If married, name of spouse</small></span></center>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="spouse_occupation" value="<?php echo ($row['spouse_occupation']); ?>"  />
                                <center><span><small>Spouse Occupation</small></span></center>
                            </div>                             
                        </div>
                        <br>  
                        <div class="row">
                            <div class="col-sm-12">
                            <input type="email" style="background-color: #fafafa; text-transform:capitalize;text-align: center;" class="form-control inputLine"  name="email_address" value="<?php echo ($row['email_address']); ?>"  />
                            <center><span><small>Email Address</small></span></center>
                            </div>
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-9">
                                <input type="hidden" style="background-color: #fafafa;text-align: center;" class="form-control inputLine"  name="" value=""  />
                            </div>

                            <div class="col-sm-3">
                                <input type="text" style="background-color: #fafafa;text-align: center;" class="form-control inputLine" onfocus="(this.type='date')" name="dateapplied" value="<?php echo ($row['dateapplied']); ?>"  />
                            <center><span><small>Date applied</small></span></center>
                            </div>
                        </div>

                        <div class="line"></div>

  <?php } else { ?>
                  <form method="POST" action="edit_not_en.php<?php echo '?id='.$row['userid']; ?>">
                     
                        <div class="row"> 
                            <div class="col-sm-7"></div>
                            <div class="col-sm-3">
                                <input type="text" style="background-color: #fafafa; text-align: center;"  class="form-control inputLine" name="student_id" id="student_id_val" value="<?php echo ($row['student_id']); ?>"/>
                                <center><span><small>Student ID</small></span></center>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" style="background-color: #fafafa; text-align: center;"  class="form-control inputLine" name="type" id="type" value="<?php echo ($row['type']); ?>"/>
                                <center><span><small>Type</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa;"  class="form-control inputLine" name="lastname" value="<?php echo ($row['lastname']); ?>"  />
                                <center><span><small>Lastname</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="firstname" value="<?php echo ($row['firstname']); ?>"  />
                                <center><span><small>Firstname</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="middlename" value="<?php echo ($row['middlename']); ?>"  />
                                <center><span><small>Middlename</small></span></center>
                            </div>
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-3">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="sex" value="<?php echo ($row['sex']); ?>"  />
                            <center><span><small>Sex</small></span></center>                            
                            </div>

                            <div class="col-sm-3">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="civil_status" value="<?php echo ($row['civil_status']); ?>"  />
                                <center><span><small>Civil Status</small></span></center>  
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="text-transform:capitalize;text-align: center;background-color: #fafafa"  class="form-control inputLine" name="religion" value="<?php echo ($row['religion']); ?>"  />
                                <center><span><small>Religion</small></span></center>
                            </div>                            
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <input onchange="getAge0()" type="text" onfocus="(this.type='date')" style="background-color: #fafafa;text-align: center;" id="birthday0" class="form-control inputLine" name="date_of_birth" value="<?php echo ($row['date_of_birth']); ?>"  />
                                <center><span><small>Date of Birth</small></span></center>
                            </div>

                            <div class="col-sm-2">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="age" id="age0" readonly="" value="<?php echo ($row['age']); ?>"  />
                                <center><span><small>Age</small></span></center>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="background-color: #fafafa; text-transform:capitalize;text-align: center;" class="form-control inputLine" name="place_of_birth" value="<?php echo ($row['place_of_birth']); ?>"  />
                                <center><span><small>Place of Birth</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                            <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="permanent_address" value="<?php echo ($row['permanent_address']); ?>"  />
                            <center><span><small>Permanent Address</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="name_of_parent" value="<?php echo ($row['name_of_parent']); ?>"  />
                                <center><span><small>Name of parent</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="parent_occupation" value="<?php echo ($row['parent_occupation']); ?>"  />
                                <center><span><small>Parent Occupation</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="parent_contact_no" value="<?php echo ($row['parent_contact_no']); ?>"  pattern="[0-9]{11}" title="Contact number must be 11 digits"  />
                                <center><span><small>Parent Contact no.</small></span></center>
                            </div>                            
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="name_of_guardian" value="<?php echo ($row['name_of_guardian']); ?>"  />
                                <center><span><small>Name of guardian</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="guardian_occupation" value="<?php echo ($row['guardian_occupation']); ?>"  />
                                <center><span><small>Guardian Occupation</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="guardian_contact_no" value="<?php echo ($row['guardian_contact_no']); ?>" pattern="[0-9]{11}" title="Contact number must be 11 digits"  />
                                <center><span><small>Guardian Contact no.</small></span></center>
                            </div>                            
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" style="background-color: #fafafa;text-align: center;" class="form-control inputLine"  name="if_married_spouse_name" value="<?php echo ($row['if_married_spouse_name']); ?>"  />
                                <center><span><small>If married, name of spouse</small></span></center>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="spouse_occupation" value="<?php echo ($row['spouse_occupation']); ?>"  />
                                <center><span><small>Spouse Occupation</small></span></center>
                            </div>                             
                        </div>
                        <br>
                             
                        <div class="row">
                            <div class="col-sm-12">
                            <input type="email" style="background-color: #fafafa; text-transform:capitalize;text-align: center;" class="form-control inputLine"  name="email_address" value="<?php echo ($row['email_address']); ?>"  />
                            <center><span><small>Email Address</small></span></center>
                            </div>
                        </div>

                        <br> 

                        <div class="row">
                            <div class="col-sm-9">
                                <input type="hidden" style="background-color: #fafafa;text-align: center;" class="form-control inputLine"  name="" value=""  />
                            </div>

                            <div class="col-sm-3">
                                <input type="text" style="background-color: #fafafa;text-align: center;" class="form-control inputLine" onfocus="(this.type='date')" name="dateapplied" value="<?php echo ($row['dateapplied']); ?>"  />
                            <center><span><small>Date applied</small></span></center>
                            </div>
                        </div> 

                        <div class="line"></div>

                        <center>
                           <button type="submit" name="updateInfo3" class="btn btn-success btn-sm"><i class="fas fa-save"></i>  | Save changes</button>
                           <a class="btn btn-danger btn-sm" href="#cancel" data-toggle="modal"><i class="fas fa-window-close"> | </i> Cancel</a>
                        </center>
                </form>
 <?php } ?>

<script>
      function getAge0() {
        var here = document.getElementById("birthday0").value;
        var today = new Date();
        var birthDate = new Date(here);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age = age - 1;
    }
    document.getElementById("age0").value = age;
}
</script>
                   
