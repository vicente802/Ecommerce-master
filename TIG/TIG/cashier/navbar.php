
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <?php
                        $pic=mysqli_query($conn,"select * from cashier where userid='".$_SESSION['id']."'");
                        $prow=mysqli_fetch_array($pic);
                ?>
                    <center><img src="../<?php if(empty($prow['image'])){echo "./upload/profile.jpg";}else{echo $prow['image'];} ?>" id="logo" class="rounded-circle" alt="Circular Image" ></center ><br>
                   
            </div>

             <ul class="list-unstyled components" style="font-size: 13px;">
                <li>
                    <a href="cashier_page.php"><i class="fas fa-home"></i> | Cashier Dashboard</a>
                </li>
                <li>
                    <a href="students_record.php"><i class="fas fa-money-bill-wave"></i> |  Students Account</a>
                </li>
                <li>
                    <a href="cashier_account.php"><i class="fas fa-user-tie"></i> | Cashier's Profile</a>
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
         