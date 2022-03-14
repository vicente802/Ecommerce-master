<?php include('head.php'); ?>
<style type="text/css">   
.inputLine {
    border: 0;
    border-bottom: 1px solid #000;
    background-color: white;
}    
</style>

<div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <?php  
                        $pic=mysqli_query($conn,"select * from student where userid='".$_SESSION['userid']."'");   
                        $prow=mysqli_fetch_array($pic);

                        $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                        $semRow = mysqli_fetch_array($semquer);            

                        $sqid=mysqli_query($conn, "select student_id from app_for_admission where userid='".$_SESSION['userid']."' ")
                ?>
                    <center><img src="../<?php if(empty($prow['image'])){echo "./upload/profile.jpg";}else{echo $prow['image'];} ?>" id="logo" class="rounded-circle" alt="Circular Image"></center><br>
                    <div class="container" style="border: 3px solid black; background-color: white; ">
                        <span style="font-size: 11px; color: black;"><strong>Name: <?php echo $fullname; ?></strong> </span><br>   
                        <span style="font-size: 10px; color: black;"><strong>Student ID: <?php echo $student_id; ?></strong> </span><br>
                    </div>    
            </div>

            <ul class="list-unstyled components" style="font-size: 13px">
                        <li class="Active">
                            <a href="student_account.php"><i class="fas fa-user-tie"></i> Student Profile</a>
                        </li>
                        <li>
                            <a href="admission.php"><i class="fab fa-black-tie"></i> Admission</a>
                        </li>
            </ul>

            <ul class="list-unstyled CTAs"> 
                 <li>
                    <a href="#logout" class="logout" data-toggle="modal"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>

  <!-- Toggle Side-bar -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

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
                        <div>
                            <?php $semquer = mysqli_query($conn, "SELECT * from semester where status = 'Active' ");
                            $semRow = mysqli_fetch_array($semquer);
                          ?>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                            <h5><i class="fas fa-user-tie"></i> Student Profile</h5>
                        </ul>
                    </div>
                </div>
            </nav>
  
    
            <?php
                $sq=mysqli_query($conn,"SELECT * from student left join user on user.userid=student.userid where user.userid='".$_SESSION['userid']."'");
                $crow=mysqli_fetch_array($sq);
            ?>  
                <br>

                <div class="row">
                <div class="container-fluid"> 
                       
                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username" name="username" readonly="" value="<?php echo ($crow['username']); ?>" style="background-color: transparent;">
                          </div>
                        </div>
 
                            <div class="col-auto">
                              <label class="sr-only" for="inlineFormInputGroup">Fullname</label>
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" style="width: 50px"><i class="fas fa-address-card"></i></div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Fullname" name="fullname" readonly="" value="<?php echo ucwords($crow['fullname']); ?>" style="background-color: transparent;">
                              </div>
                            </div>

                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Contact Number</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fas fa-phone"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Contact Number" name="contact_number" readonly="" value="<?php echo ($crow['contact_number']); ?>" style="background-color: transparent;">
                          </div>
                        </div>

                        <input type="hidden" name="image" value="<?php echo ($arow1['image']); ?>">  

                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Password</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="width: 50px"><i class="fab fa-slack-hash"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Password" name="password" readonly="" value="########" style="background-color: transparent;">
                          </div>
                        </div>
                        <br>
                        <center><a  class="btn btn-primary btn-sm" data-toggle="modal" href="#edit<?php echo $crow['userid']; ?>" style="background-color: #4080bf; "> <i class="fa fa-edit"></i> | Edit account</a></center>
                    </div>   
                </div>
                </div>

                    <input type="hidden" name="id" value="<?php echo ($arow['id']); ?>">  

  
            </div>
        </div>
    </div>
</div>
</div>
<?php include('modal.php'); ?>

</body>
</html>
