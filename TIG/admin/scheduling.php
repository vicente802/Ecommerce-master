<?php include('head.php'); ?>
<div class="wrapper">
<?php include('navbar.php') ?>
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
                            <?php $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
                                  $syRow = mysqli_fetch_array($query);
                                  $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                                  $semRow = mysqli_fetch_array($semquer);
                            ?>
                          <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                          <h5><i class="fas fa-clock"></i> Scheduling</h5>
                        </ul>
                    </div>
                  </div>
              </nav>

                  <?php include('add_subject_sched.php'); ?>

    <div class="col-sm-4"> 
        <select class="form-control" name="program_id" id="program_id" onchange="show_courses()">
        <?php $subjsql=mysqli_query($conn,"select * from courses");
              
              while($subjectrow=mysqli_fetch_array($subjsql)){ ?>
                  <option value="<?php echo $subjectrow['program_id']; ?>"><?php echo $subjectrow['program']; ?></option>
        <?php } ?>  
        </select>
    </div> 
    <br><br><br>

                <?php 
                  $firstSql=mysqli_query($conn,"select * from semester where status = 'Active' ");
                  $firstRow = mysqli_fetch_array($firstSql);

                  include('sched_table.php'); ?>

                    <?php include('new-data-modal.php'); ?>
        </div>
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
        document.getElementById("2").disabled = true; 

    }else if(select_subject == '2') {
        $('#1').hide();
        $('#2').show();
        document.getElementById("1").disabled = true; 

    }

}
</script>
