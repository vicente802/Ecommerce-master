<?php include('head.php'); ?>
<div class="wrapper">

        <nav id="sidebar">
            <div class="sidebar-header">
                <?php
                        $pic=mysqli_query($conn,"select * from admin where userid='".$_SESSION['id']."'");
                        $prow=mysqli_fetch_array($pic);
                ?>
                    <center><img src="../<?php if(empty($prow['image'])){echo "./upload/profile.jpg";}else{echo $prow['image'];} ?>" id="logo" class="rounded-circle" alt="Circular Image" ></center ><br>

                    <div class="container" style="background-color: transparent;">
                         <center><strong><p style="font-size: 15px; color: white;"><?php echo $fullname; ?></p></strong></center>
                    </div>
            </div>

             <ul class="list-unstyled components" style="font-size: 13px;">
                <li>
                    <a href="admin_page.php" class=""><i class="fas fa-home"></i> | Admin Dashboard</a>
                </li>
                <li>
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-folder-open"></i> | Admin Files</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu1">
                        <li>
                            <a href="list-subjects.php"><i class="fas fa-book"></i> | Manage Subjects</a>
                        </li>                        
                        <li>
                            <a href="scheduling.php"><i class="fas fa-clock"></i> | Scheduling</a>
                        </li>
                        <li>
                            <a href="school_year.php"><i class="far fa-calendar-alt"></i> | Session</a>
                        </li>

                    </ul>
                </li>

        <li class="Active">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> | Users</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu2">
                        <li>
                            <a href="admin_user.php"><i class="fas fa-user-friends"></i> | Admin</a>
                        </li>
                        <li>
                            <a href="cashier_users.php"><i class="fas fa-cash-register"></i> | Cashier</a>
                        </li>
                        <li>
                            <a href="scheduling.php"><i class="fas fa-chalkboard-teacher"></i> | Instructor</a>
                        </li>
                    </ul>
                </li>

                <li>
                <?php $ensql=mysqli_query($conn,"select * from enrollment where status='Pending'"); $enrolrow=mysqli_fetch_array($ensql);
                    
                    if ($enrolrow == 0) { ?>
                        <a href="pending-enrollment.php"><i class="fas fa-bell-slash"></i> | Pending Request</a> <span></span>            
             <?php }else{ ?>
                        <a href="pending-enrollment.php"><i class="fa fa-bell" aria-hidden="true"></i> | Pending Request <span id="count-enrolled" class="badge badge-danger"></span></a>
             <?php }  ?>

                </li>
                <li>
                    <a href="enrolled_students.php"><i class="fas fa-chart-bar"></i> | Enrolled Students</a>
                </li>
                <li>
                    <a href="admin_account.php"><i class="fas fa-cogs"></i> | Admin account</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                 <li>
                    <a href="#logout" class="logout" data-toggle="modal"><i class="fas fa-sign-out-alt"></i> | Logout</a>
                </li>
            </ul>
        </nav>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>
<script type="text/javascript">
    function loadDoc() {

    setInterval(function(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
                
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("count-enrolled").innerHTML = this.responseText;
        }
    };
            xhttp.open("GET", "count-enrolled-subjects.php", true);
            xhttp.send(); 
        },1000)

    }
    loadDoc();
    </script>
<div class="container-fluid">


<head>
    <style type="text/css">
        .error_form
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
                        <div style="margin-left: 20px;">
                          <?php $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
                            $syRow = mysqli_fetch_array($query)
                          ?>

                            <?php $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                            $semRow = mysqli_fetch_array($semquer);
                          ?>
                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                          <h5><i class="fas fa-users"></i> Instructor Users</h5>
                        </ul>
                    </div>
                </div>
            </nav>
            <button class="btn btn-primary btn-sm" data-target="#add_instructor_modal" data-toggle="modal" style="background-color: #4080bf"> New Instructor</button>
            
            <div class="line"></div>
            
                 <?php include('instructorTable.php'); ?>
       
            </div>
        </div>
    </div>

  <div class="modal fade modal-fullscreen" id="add_instructor_modal" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding Instructor</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="container-fluid">
                <form method="post" action="instructor_db.php" id="">
                    <div class="col-auto">
                      <label class="sr-only" for="inlineFormInputGroup">Fullname</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text" style="width: 50px"><i class="fas fa-user-tie"></i></div>
                        </div>
                        <input type="text"  placeholder="Fullname" name="fullname" class="form-control" id="form_fname_1" required="" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}">
                      </div>
                    </div>

                    <div class="col-auto">
                      <label class="sr-only" for="inlineFormInputGroup">Contact number</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text" style="width: 50px"><i class="fas fa-phone"></i></div>
                        </div>
                        <input type="text" placeholder="Contact number" name="contact_number" pattern="[0-9]{11}" title="Contact number must only contain 11 digits" class="form-control" id="form_contact_number_1" required="">
                      </div>
                    </div>

                    <div class="col-auto">
                      <label class="sr-only" for="inlineFormInputGroup">Address</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text" style="width: 50px"><i class="fas fa-address-card"></i></div>
                        </div>
                        <input class="form-control" id="address_1" required="" type="text" name="address" placeholder="Address">
                      </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" name="addsub" id="addsub btnTestSaveTextButtons" class="btn btn-success btn-sm"><i class="fa fa-save"></i> | Save</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
                    </div>
            </form>
        </div> 
        </div>
    </div>
</div>
</div>  

<?php include('tableScript.php'); ?>
<script src="dist/js/fs-modal.min.js"></script>
<script type="text/javascript">
     $(document).ready(function() {
        $('table.display').DataTable();
    } );   
</script>
</body>
</html>


  