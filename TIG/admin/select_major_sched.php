 <style>
  .dropdown-item{
    font-family: consolas;
    font-size: 19px;
    color: black;
  }
  .dropdown-item:hover{
    font-weight: bold;
    background-color: #e8e6e6;
  }
  .dropdown-item:active{
    background-color: white;
    color:black;
  }  
 </style> 


  <div class="modal fade modal-fullscreen" id="select_schedmodal" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding schedule for...</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			   <div class="container-fluid">
				   
               <div class="container-fluid">  
                 <div class="container-fluid">

                <input type="hidden" name="program_id" id="program_id">
                <input type="hidden" name="schedule_id" id="schedule_id">

                  <div class="row">
                     <div class="col-sm-12"> 
                        <select class="form-control" name="subjects_id" id="" >
                          <option name=""  style="display: none;">SELECT SUBJECT</option>
                          <?php
                            $engsql=mysqli_query($conn,"select * from mse_english");
                            while($engrow=mysqli_fetch_array($engsql)){
                              ?>
                                <option value="<?php echo $engrow['subjects_id']; ?>"><?php echo $engrow['descriptive_title']; ?></option>
                              <?php
                            }
                          ?>
                        </select>
                     </div>
                   </div>
                   <br>





                   <div class="row">
                     <div class="col-sm-12"> 
                        <select class="form-control" name="instructor" id="instructor" >
                          <option name=""  style="display: none;">SELECT INSTRUCTOR</option>
                          <?php
                            $maedsql=mysqli_query($conn,"select * from instructor");
                            while($maedrow=mysqli_fetch_array($maedsql)){
                              ?>
                                <option value="<?php echo $maedrow['instructor_id']; ?>"><?php echo $maedrow['fullname']; ?></option>
                              <?php
                            }
                          ?>
                        </select>
                     </div>
                   </div>
                   <br>
                   
                 </div>
               </div>   

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                </div>
        

        </div> 
        </div>
        

      </div>
    </div>
  </div>  
