<!-- Student Information-->    
<style type="text/css">   
.thisline{
    width: 240px;
    height: 10px;
    border-bottom: 1px solid black;
    }
.inputLine {
    border: 0;
    border-bottom: 2px solid #003366;
    border-left: 1px solid #003366;
    border-right: 1px solid #003366;
    border-top: 1px solid #003366;
    width: 100%;
    font-size: 15px;
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
                
                         
                $semquer = mysqli_query($conn, "SELECT * from semester where status = 'Active' ");
                $semRow = mysqli_fetch_array($semquer);
                         

                $sq=mysqli_query($conn,"SELECT * from app_for_admission where userid='".$_SESSION['userid']."'");
                $row=mysqli_fetch_array($sq);
                if(empty($row)){
                ?> 

                    <h3 style="text-align: center;"><i class="far fa-address-book"></i> Registration Form</h3>
                    <hr>

                    <div class="container-fluid">
                    <form method="POST" action="admission_db.php" onsubmit="return save(this);">
                       
                        <div class="row"> 
                            <div class="col-sm-7">   
                                <input type="checkbox" name="student_id" id="student_id_box" value="Not available*"  onclick="disableMyText()">
                                <small style="color: red;">*Please check this box if you do not have School ID yet.</small>
                            </div>
                            <div class="col-sm-2"id="old" >
                                <select name="type"style="background-color: #fafafa;" class="form-control inputLine" name="type" required>
                                    <option style="display: none; text-align: center;">Type</option>
                                    <option value="Old">Old</option>
                                    <option value="New">New</option>   
                                </select>
                                <center><span><small>Type</small></span></center>
                            </div>
                            <div class="col-sm-2" style="display: none;" id="new">
                                <select name="type"style="background-color: #fafafa;" class="form-control inputLine" name="type" required>
                                    <option value="New">New</option>   
                                </select>
                                <center><span><small>Type</small></span></center>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" style="background-color: #fafafa;"  class="form-control inputLine" name="student_id" id="student_id" required />
                                <center><span><small>Student ID</small></span></center>
                            </div>

                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa"  class="form-control inputLine" name="lastname" required onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" />
                                <center><span><small>Lastname</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa"  class="form-control inputLine" name="firstname" required onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" />
                                <center><span><small>Firstname</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa"  class="form-control inputLine" name="middlename" required onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" />
                                <center><span><small>Middlename</small></span></center>
                            </div>
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-3">
                            <select name="sex" style="background-color: #fafafa;" class="form-control inputLine"  name="sex" required>
                                <option style="display: none;">Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>     
                            </select>
                            <center><span><small>Sex</small></span></center>                            
                            </div>

                            <div class="col-sm-3">
                                <select name="civil_status"style="background-color: #fafafa;" class="form-control inputLine"  name="civil_status" required>
                                    <option style="display: none;">Civil Status</option>
                                    <option value="Married">Married</option>
                                    <option value="Single">Single</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Devorced">Divorced</option>
                                    <option value="Separated">Separated</option>      
                                </select>
                                <center><span><small>Civil Status</small></span></center>  
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa"  class="form-control inputLine" name="religion" required onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                                <center><span><small>Religion</small></span></center>
                            </div>                            
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <input onchange="getAge()" type="text" onfocus="(this.type='date')" style="background-color: #fafafa;" id="birthday" class="form-control inputLine" name="date_of_birth" required>
                                 <center><span><small>Date-Month-year </small><small> Date of Birth</small></span></center>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" style="background-color: #fafafa" class="form-control inputLine" name="age" id="age" readonly="">
                                <center><span><small>Age</small></span></center>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="background-color: #fafafa; text-transform:capitalize;" class="form-control inputLine" name="place_of_birth" required >
                               <center><span><small>Place of Birth</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                            <input type="text" style="text-transform:capitalize; background-color: #fafafa;"  class="form-control inputLine" name="permanent_address" required>
                            <center><span><small>Permanent Address</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa;"  class="form-control inputLine" name="name_of_parent" required onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                                <center><span><small>Name of parent</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa;"  class="form-control inputLine" name="parent_occupation" required onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                                <center><span><small>Parent Occupation</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;"  class="form-control inputLine" name="parent_contact_no" placeholder="Must be 11 digits only" pattern="[0-9]{11}" title="Contact number must be 11 digits" required>
                                <center><span><small>Parent Contact no.</small></span></center>
                            </div>                            
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa;"  class="form-control inputLine" name="name_of_guardian" required onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                                <center><span><small >Name of guardian</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa;"  class="form-control inputLine" name="guardian_occupation" required onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                                <center><span><small >Guardian Occupation</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;"  class="form-control inputLine" name="guardian_contact_no" placeholder="Must be 11 digits only" pattern="[0-9]{11}" title="Contact number must be 11 digits" required>
                                <center><span><small>Guardian Contact no.</small></span></center>
                            </div>                            
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa;" class="form-control inputLine"  name="if_married_spouse_name" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                                <center><span><small>If married, name of spouse</small></span></center>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="background-color: #fafafa;"  class="form-control inputLine" name="spouse_occupation" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                                <center><span><small>Spouse Occupation</small></span></center>
                            </div>                             
                        </div>
                        <br>
                             
                        <div class="row">
                            <div class="col-sm-12">
                            <input type="email" style="background-color: #fafafa; " class="form-control inputLine"  name="email_address" required>
                            <center><span><small>Email Address</small></span></center>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-8">
                                
                            </div>
                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;" class="form-control inputLine" onfocus="(this.type='date')" name="dateapplied" value=""  />
                            <center><span><small>Date applied</small></span></center>
                            </div>
                        </div>
                                        
                        <div class="line"></div>

                        <br>

                        <div class="btnSave" style="text-align: center;">
                            <button type="submit" class="btn btn-primary btn-sm" name="save"><i class="fa fa-save"></i> | Save information</button>
                        </div>  
                </form>
            </div>

<script>
     function disableMyText(){  
        if(document.getElementById("student_id_box").checked == true){  
              document.getElementById("student_id").disabled = true;
              document.getElementById("old").disabled = true;
            $('#new').show();
            $('#old').hide();

        }else{
            $('#old').show();
            $('#new').hide();
            document.getElementById("student_id").disabled = false;
            document.getElementById("new").disabled = true;    
        }
     }  

</script>


    <?php  } else {  ?>

                    <h3 style="text-align: center;"><i class="far fa-address-book"></i> Registration Form</h3>
                    <hr>
                    <form method="" action="" onsubmit="return save(this);">
                       
                        <div class="row"> 
                            <div class="col-sm-7"></div>
                            <div class="col-sm-3">
                                <input type="text" style="background-color: #fafafa; text-align: center;"  class="form-control inputLine" name="student_id" id="student_id_val" value="<?php echo ($row['student_id']); ?>" readonly/>
                                <center><span><small>Student ID</small></span></center>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" style="background-color: #fafafa; text-align: center;"  class="form-control inputLine" name="type" id="type" value="<?php echo ($row['type']); ?>" readonly/>
                                <center><span><small>Type</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize;text-align: center;background-color: #fafafa"  class="form-control inputLine" name="lastname" value="<?php echo ($row['lastname']); ?>" readonly />
                                <center><span><small>Lastname</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="firstname" value="<?php echo ($row['firstname']); ?>" readonly />
                                <center><span><small>Firstname</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="middlename" value="<?php echo ($row['middlename']); ?>" readonly />
                                <center><span><small>Middlename</small></span></center>
                            </div>
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-2">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="age" value="<?php echo ($row['age']); ?>" readonly />
                                <center><span><small>Age</small></span></center>
                            </div>

                            <div class="col-sm-3">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="sex" value="<?php echo ($row['sex']); ?>" readonly />
                            <center><span><small>Sex</small></span></center>                            
                            </div>

                            <div class="col-sm-3">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="civil_status" value="<?php echo ($row['civil_status']); ?>" readonly />
                                <center><span><small>Civil Status</small></span></center>  
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize;text-align: center; background-color: #fafafa"  class="form-control inputLine" name="religion" value="<?php echo ($row['religion']); ?>" readonly />
                                <center><span><small>Religion</small></span></center>
                            </div>                            
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" onfocus="(this.type='date')" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="date_of_birth" value="<?php echo ($row['date_of_birth']); ?>" readonly />
                                <center><span><small>Date of Birth</small></span></center>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="background-color: #fafafa; text-transform:capitalize;text-align: center;" class="form-control inputLine" name="place_of_birth" value="<?php echo ($row['place_of_birth']); ?>" readonly / >
                                <center><span><small>Place of Birth</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                            <input type="text" style="text-transform:capitalize; background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="permanent_address" value="<?php echo ($row['permanent_address']); ?>" readonly />
                            <center><span><small>Permanent Address</small></span></center>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="name_of_parent" value="<?php echo ($row['name_of_parent']); ?>" readonly />
                                <center><span><small>Name of parent</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="parent_occupation" value="<?php echo ($row['parent_occupation']); ?>" readonly />
                                <center><span><small>Parent Occupation</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="parent_contact_no" value="<?php echo ($row['parent_contact_no']); ?>" readonly />
                                <center><span><small>Parent Contact no.</small></span></center>
                            </div>                            
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="name_of_guardian" value="<?php echo ($row['name_of_guardian']); ?>" readonly />
                                <center><span><small>Name of guardian</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="guardian_occupation" value="<?php echo ($row['guardian_occupation']); ?>" readonly />
                                <center><span><small>Guardian Occupation</small></span></center>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" style="background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="guardian_contact_no" value="<?php echo ($row['guardian_contact_no']); ?>" readonly />
                                <center><span><small>Guardian Contact no.</small></span></center>
                            </div>                            
                        </div>
                        <br> 

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa;text-align: center;" class="form-control inputLine"  name="if_married_spouse_name" value="<?php echo ($row['if_married_spouse_name']); ?>" readonly />
                                <center><span><small>If married, name of spouse</small></span></center>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" style="text-transform:capitalize; background-color: #fafafa;text-align: center;"  class="form-control inputLine" name="spouse_occupation" value="<?php echo ($row['spouse_occupation']); ?>" readonly />
                                <center><span><small>Spouse Occupation</small></span></center>
                            </div>                             
                        </div>
                        <br>
                             
                        <div class="row">
                            <div class="col-sm-12">
                            <input type="email" style="background-color: #fafafa;text-align: center;" class="form-control inputLine"  name="email_address" value="<?php echo ($row['email_address']); ?>" readonly />
                            <center><span><small>Email Address</small></span></center>
                            </div>
                        </div>
                        <br>

                       

                        <div class="line"></div>
                        <div class="container-fluid">
   
                        <center>
                           <a href="edit_admission_form.php<?php echo '?id='.$row['userid']; ?>" class="btn btn-primary form-control"><i class="fas fa-edit"></i> | Edit information</a>
                        </center>
                        </div>

                </form>


 <?php } ?>  


  <script>
      function getAge() {
        var here = document.getElementById("birthday").value;
        var today = new Date();
        var birthDate = new Date(here);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age = age - 1;
    }
    document.getElementById("age").value = age;
}
  </script>