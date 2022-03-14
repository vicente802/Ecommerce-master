<?php include('head.php'); ?>
<div class="wrapper">
<?php include('navbar.php'); ?>
<div class="container-fluid">

<head>
<style>

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
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                          <h3><i class="fas fa-graduation-cap"></i> List Courses</h3>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="row"> 
               <div class="col-sm-12">
                <br><h1>List of Course</h1><br><br>

                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#list-course-modal" style="background-color: #4080bf"> <i class="fa fa-plus"></i> New Course</button><br><br>

                  <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 15px;">
                    <thead>
                      <tr>
                        <th>Program</th>
                        <th>Accreditation Level</th>
                        <th>BOT Resolution</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $query=mysqli_query($conn,"select * from courses");
                        
                        while($courserow=mysqli_fetch_array($query)){
                          ?>
                            <td><?php echo $courserow['program']; ?></td>
                            <td><?php echo $courserow['accreditation_level']; ?></td>
                            <td><?php echo $courserow['BOT_resolution']; ?></td>
                            <td>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_course<?php echo $courserow['program_id']; ?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_course<?php echo $courserow['program_id']; ?>"><i class="fa fa-trash"></i></button>

                                <?php include('edit_course.php'); ?>
                              
                            </td>                          
                          </tr>
                          <?php 
                        }
                      ?>
                    </tbody>

                  </table>
                </div>

          <div class="line"></div> 

              <div class="col-sm-12">
             <br><h1>List of Majors</h1><br><br>

                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#list-course-modal1" style="background-color: #4080bf"> <i class="fa fa-plus"></i> New Major</button><br><br>

                  <table id="myTable" class="display table table-responsive-md table-hover table table-bordered" style="width:100%; font-size: 15px;">
                    <thead>
                      <tr>
                        <th>Program</th>
                        <th>Major</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
                        $query1=mysqli_query($conn,"select * from major left join courses on courses.program_id=major.program_id");
                        
                        while($majorow=mysqli_fetch_array($query1)){
                          ?>
                            <td><?php echo $majorow['program']; ?></td>
                            <td><?php echo $majorow['major']; ?></td>
                            <td>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_major<?php echo $majorow['major_id']; ?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_major<?php echo $majorow['major_id']; ?>"><i class="fa fa-trash"></i></button>
                              <?php include('edit_course.php'); ?>
                              
                            </td>                          
                          </tr>
                          <?php 
                        }
                      ?>
                    </tbody>

                  </table>
                      </div>
                </div>

                </div>
                <br><br>

            <div class="line"></div>       
      </div>

<!-- Course Modal-->

  <div class="modal fade modal-fullscreen" id="list-course-modal" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding Course...</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">
              <form method="post" action="list-course_db.php" id="">
               <div class="container-fluid">  
                 <div class="container-fluid">
                  <br>
                     
                   <input type="hidden" name="program_id" class="form-control" id="program_id">                                                          
                   <div class="row">
                     <div class="col-sm-12">
                      <input type="text" placeholder="Program" name="program" class="form-control" id="program" required>
                    </div>                 
                   </div>
                   <br>  

                   <div class="row">
                     <div class="col-sm-6">
                      <input type="text" placeholder="Accreditation lvl" name="accreditation_level" class="form-control" id="accreditation_level" required>
                    </div>                 
                     <div class="col-sm-6">
                      <input type="text" placeholder="BOT Resolution" name="BOT_resolution" class="form-control" id="BOT_resolution" required>
                    </div>                 
                   </div>
                   <br>  

                 </div>
               </div>   

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="addsub" id="addsub btnTestSaveTextButtons" class="btn btn-success"><i class="fa fa-save"></i> Save Course</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                </div>
        
        </form>
        </div> 
        </div>
        

      </div>
    </div>
  </div>  
 
<!-- Major Modal-->

  <div class="modal fade modal-fullscreen" id="list-course-modal1" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding Course...</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid">
              <form method="post" action="list-major_db.php" id="">
               <div class="container-fluid">  
                 <div class="container-fluid">
                  <br>
                     
                   <input type="hidden" name="major_id" class="form-control" id="major_id"> 

                   <div class="row">
                     <div class="col-sm-10">
                        <select class="form-control" name="program" id="program">
                          <option name=""  style="display: none;">SELECT COURSE</option>
                          <?php
                            $subjsql=mysqli_query($conn,"select * from courses ");
                            while($subjectrow=mysqli_fetch_array($subjsql)){
                              ?>
                                <option value="<?php echo $subjectrow['program_id']; ?>"><?php echo $subjectrow['program']; ?></option>
                              <?php
                            }
                          ?>
                        </select>
                    </div>                 
                   </div>
                   <br>  

                   <div class="row">
                     <div class="col-sm-12">
                      <input type="text" placeholder="Major" name="major" class="form-control" id="major" required>
                    </div>                                
                   </div>
                   <br>  

                 </div>
               </div>   

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="addsub" id="addsub btnTestSaveTextButtons" class="btn btn-success"><i class="fa fa-save"></i> Save Major</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                </div>
        
        </form>
        </div> 
        </div>
        

      </div>
    </div>
  </div>  
 
    <script src="dist/js/fs-modal.min.js"></script>
    <?php include('tableScript.php'); ?>
<script type="text/javascript">
 $(document).ready(function() {
    $('table.display').DataTable();
} );   
</script>

</body>
</html>
