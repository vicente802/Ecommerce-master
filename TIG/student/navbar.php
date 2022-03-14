 <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <?php  
                        $pic=mysqli_query($conn,"select * from student where userid='".$_SESSION['userid']."'");   
                        $prow=mysqli_fetch_array($pic);

                        $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                        $semRow = mysqli_fetch_array($semquer);            

                        
                ?>
                    <center><img src="../<?php if(empty($prow['image'])){echo "./upload/profile.jpg";}else{echo $prow['image'];} ?>" id="logo" class="rounded-circle" alt="Circular Image"></center><br>
                    <div class="container" style="border: 3px solid black; background-color: white; ">
                        <span style="font-size: 11px; color: black;"><strong>Name: <?php echo $fullname; ?></strong> </span><br>   
                        <span style="font-size: 10px; color: black;"><strong>Student ID: <?php echo $student_id; ?></strong> </span><br>
                    </div>    
            </div>

            <ul class="list-unstyled components" style="font-size: 13px">
                        <li>
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

