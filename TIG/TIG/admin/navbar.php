<?php include ('connect.php');     
 ?>

        <nav id="sidebar">
            <div class="sidebar-header">
                <?php
                        $pic=mysqli_query($conn,"SELECT * from admin where userid='".$_SESSION['userid']."'");
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
        <li class="">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> | Users</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu2">
                        <li>
                            <a href="admin_user.php"><i class="fas fa-user-friends"></i> | Admin</a>
                        </li>
                        <li>
                            <a href="students_account_list.php"><i class="fa fa-users" aria-hidden="true"></i> | Students</a>
                        </li>
                    </ul>
                </li>
                <li>

                <?php 

                    $pendStu=mysqli_query($conn,"select * from user where position = 'Student' AND status='Pending'"); 
                    $pendStuRow=mysqli_fetch_array($pendStu);
                    
                    if ($pendStuRow == 0) { ?>     
                            <a href="student_user.php"><i class="fas fa-bell-slash"></i> | Pending Students Account</a> <span></span>   
                 <?php }else{ ?>
                            <a href="student_user.php"><i class="fa fa-bell" aria-hidden="true"></i> | Pending Students Account <span id="count-pending_student" class="badge badge-danger"></span></a>
                 <?php }  ?>

                </li>
                <li class="">
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
<script type="text/javascript">
    function loadDoc() {

    setInterval(function(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
                
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("count-pending_student").innerHTML = this.responseText;
        }
    };
            xhttp.open("GET", "count-pend_stud.php", true);
            xhttp.send(); 
        },1000)

    }
    loadDoc();
</script>
      
