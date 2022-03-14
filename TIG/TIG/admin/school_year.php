
<?php include('head.php'); ?>
<div class="wrapper">
<?php include('navbar.php') ?>
<script type="text/javascript" src="Chart.min.js"></script> 
<style type="text/css">


/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
  float:right;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ff3333;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input.primary:checked + .slider {
  background-color: #8bc34a;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

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
                            $syRow = mysqli_fetch_array($query)
                          ?>

                            <?php $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
                            $semRow = mysqli_fetch_array($semquer);
                          ?>
                            <span><strong><i class="fa fa-calendar"></i></strong></span><span> <?php echo $syRow['sy']; ?> | <?php echo $semRow['semester']; ?></span>
                        </div>
                        <ul class="nav navbar-nav ml-auto">
                          <h4><i class="far fa-calendar-alt"></i> School Session</h4>
                        </ul>
                    </div>
                </div>
            </nav>
<body>
  
        <form action="sy_db.php" method="POST"> 
          <div class="form-group">
            <div class="row">
              <div class="col-4 ">
                <input type="text" name="sy" class="form-control" id="filerAddress" placeholder="ex: 2019-2020" required="">
              </div>
              <div class="col-1 col-sm-2">
                <button type="submit" class="btn btn-primary" value="submit" name="submit" >
                  <i class="fas fa-plus"></i> Add School year
                </button>
              </div>
            </div>
          </div>
        </form>  
        <br><br>
        <div class="row">
          <div class="col-sm-4"> 
            <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="font-size: 15px; text-align: center; width: 100%" >
              <thead>
                <tr>
                  <th>Semester</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $semSql=mysqli_query($conn,"select * from semester where sem_id in (1,2,3) ORDER BY sem_id ASC");
                      while($semRow=mysqli_fetch_array($semSql)){ ?>
                      <tr>
                        <td style="display: none;"><?php echo $semRow['sem_id']; ?></td>
                        <td><?php echo $semRow['semester']; ?></td>
                        <td>       
                        <?php      
                        if ($semRow['status'] == 'Active') { ?>
                        <label class="switch" >
                            <input type="checkbox" name="semStatus[]" class="primary" data-toggle="modal" data-target="#edit_sem<?php echo $semRow['sem_id']; ?>" checked />
                            <span class="slider round"></span>
                        </label>
                        <?php include('sy_modal.php'); ?>
              <?php } else{ ?>
                        <label class="switch">
                            <input type="checkbox" name="semStatus[]" class="primary" data-toggle="modal" data-target="#edit_sem<?php echo $semRow['sem_id']; ?>"id="semStatus"/>
                            <span class="slider round"></span>
                        </label>
                        <?php include('sy_modal.php'); ?>
              <?php } ?> 

                        </td>  
                      </tr>
              <?php } ?>
              </tbody>
              <tfoot>
                <th colspan="2">
                  <div> 
                    <form action="update_semester.php" method="POST">
                    <?php
                      $stopSql=mysqli_query($conn,"select * from semester where sem_id = '4'");
                      $stopRow=mysqli_fetch_array($stopSql);
                        if ($stopRow['status'] == 'Stop') { ?>
                          <div class="col-sm-12" style="text-align: center;"> 
                              <button class="btn btn-success btn-lg" name="stopper" value="Start">Start Enrollment!</button>
                          </div>
                <?php } else{ ?>
                          <div class="col-sm-12" style="text-align: center;"> 
                              <button class="btn btn-danger btn-lg" name="stopper" value="Stop">Stop Enrollment!</button>
                          </div>
                <?php  }  ?>                 
                    </form>
                  </div>
                </th>
              
              </tfoot>
              </table>
            </div>
          <div class="col-sm-3"> 
          </div>
            <div class="col-sm-4 "> 
                <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="font-size: 15px; text-align: center; width: 100%" >
                <thead>
                  <tr>
                    <th>School Year</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $testQl=mysqli_query($conn,"select * from school_year");
                        while($syrow=mysqli_fetch_array($testQl)){ ?>
                        <tr>
                          <td><?php echo $syrow['sy']; ?></td>
                          <td>  
                        <?php 
                          if ($syrow['status'] == 'Active') { ?>
                          <label class="switch" >
                              <input type="checkbox" name="syStatus[]" class="primary" data-toggle="modal" data-target="#edit_sy<?php echo $syrow['school_yr_id']; ?>" checked />
                            <span class="slider round"></span>
                          </label>
                          <?php include('sy_modal.php'); ?>
                          <?php }else{ ?>
                          <label class="switch">
                              <input type="checkbox" name="syStatus[]" class="primary" data-toggle="modal" data-target="#edit_sy<?php echo $syrow['school_yr_id']; ?>"id="syStatus"/>
                                              
                            <span class="slider round"></span>
                          </label>
                          <?php include('sy_modal.php'); ?>
                  <?php } ?> 
                      </td>  
                    </tr>
                  <?php } ?>
                </tbody>
                </table>
            </div>

        </div>

<?php include('tableScript.php'); ?>
<script type="text/javascript">
 $(document).ready(function() {
    $('table.display').DataTable();
} );   
</script>

<script type="text/javascript">
    $(function(){
      var el=$('input:checkbox[name="syStatus[]"]');
      el.on('change', function(e){
        if($(this).is(':checked')) el.not($(this)).prop('checked', false);
      });
  });
</script>

                        
<script type="text/javascript">
    $(function(){
      var el=$('input:checkbox[name="semStatus[]"]');
      el.on('change', function(e){
        if($(this).is(':checked')) el.not($(this)).prop('checked', false);
      });
  });
</script>     
    </body>
</html>
 <!--<?php //include('sy_modal.php'); ?> -->