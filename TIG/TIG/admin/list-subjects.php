<?php include('head.php'); ?>
<div class="wrapper">
  
<?php include('navbar.php') ?>
<div class="container-fluid">

<!--===============================================================================================-->  
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
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
                        <div >
                          <?php 
                            $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
                            $syRow = mysqli_fetch_array($query);
                            $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                            $semRow = mysqli_fetch_array($semquer);
                          ?>
                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>

                        <ul class="nav navbar-nav ml-auto">
                          <h5><i class="fas fa-book"></i> Subjects</h5> 
                         
                        </ul>

                    </div>
                </div>
            </nav>

            <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary" style="border-radius: 5px;">
                <div class="container-fluid">
                      <div>
                          <select class="form-control" name="program_id" id="program_id" onchange="show_courses()">
                          <?php
                            $subjsql=mysqli_query($conn,"select * from courses");
                            while($subjectrow=mysqli_fetch_array($subjsql)){
                              ?>
                                <option value="<?php echo $subjectrow['program_id']; ?>"><?php echo $subjectrow['program']; ?></option>
                              <?php
                            }
                          ?>  
                        </select>
                      </div>
                    

                    <button class="btn btn-primary d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#addSectionContent" aria-controls="addSectionContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="addSectionContent">
                      <ul class="nav navbar-nav ml-auto">
                        <div id="entry1" style="float: right;">
                              <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#major-modal-1"> New major </button>
                              <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#add_submodal"> New subject </button>
                              <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#add_instrucmodal"> New instructor</button>
                        </div>
                        <div id="entry2" style="display: none; float: right;">
                              <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#major-modal-2"> New major </button>
                              <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#add_submodal1"> New subject </button>
                              <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#add_instrucmodal"> New instructor</button>
                        </div>
                      </ul>
                    </div>
                </div>
            </nav>

                <?php 
                  $firstSql=mysqli_query($conn,"select * from semester where status = 'Active' ");
                  $firstRow = mysqli_fetch_array($firstSql);

                 include('subject_Table.php'); ?>

                <?php include('new-data-modal.php'); ?>
                <?php include('new-subject-modal.php'); ?>
                <?php include('new-subject-modal2.php'); ?>
                <?php include('add_instructor_modal.php'); ?>
                
            </div>  
        </div>
    </div>
</div>
    

<?php include('tableScript.php'); ?>

</body>
</html>

<script type="text/javascript">
 $(document).ready(function() {
    $('table.display').DataTable();
} );   
</script>

<script type="text/javascript">
  function show_courses(){
      var select_subject=$('#program_id').val();
     
    if(select_subject == '1') {
        $('#1').show();
        $('#2').hide();
        $('#sem').show();
        $('#entry1').show(); 
        $('#entry2').hide();
        document.getElementById("2").disabled = true; 

    }else if(select_subject == '2') {
        $('#1').hide();
        $('#2').show();
        $('#sem').show();
        $('#entry1').hide(); 
        $('#entry2').show();        
        document.getElementById("1").disabled = true; 

    }

}
</script>


<!--
<script type="text/javascript">

  function show_courses(){
    var selectCourse = document.getElementById("program_id").value;
    console.log(selectCourse);
  }
  show_courses();
</script>  