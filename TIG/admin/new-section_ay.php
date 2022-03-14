<!----------------------- SCHOOL YEAR ------------------------>

  <div class="modal fade modal-fullscreen" id="sy-modal-1" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding School Year</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid box">
              <form method="post" action="sy_db.php">
                 <div class="container-fluid">  
                   <div class="container-fluid">
                    <br>
                     <input type="hidden" name="major_id" class="form-control" id="major_id"> 

                        <div id="font" class="hid">
                            <i class="fas fa-check"></i>
                        </div>
                        <div id="wrong" class="hid">
                            <i class="fas fa-times"></i>
                        </div>

                     <div class="row ">
                        <div class="col-sm-12 inputBox">
                          <input type="text" class="form-control" name="sy" id="sy00" onkeyup="validateSy()" required=""/>
                          <label id="commentSYPromt">School Year</label> 
                        </div>                                
                     </div>
                     <br>  

                   </div>
                 </div>  
                 </form>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <label id="submitPromtsy" style="text-align: center; font-size: 15px;"></label>
                    <button type="submit" name="btnsub" id="btnsub" class="btn btn-success btn-sm" onclick="validateSubmitFormSy()"><i class="fa fa-save"></i> | Save</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
                </div>

              </div> 
            </div>
          </div>
        </div>
      </div>


<script>
    function producePromt(message, promtLocation, color){
    document.getElementById(promtLocation).innerHTML = message;
    document.getElementById(promtLocation).style.color = color;
    }

    function validateSy(){
      var sy00 = document.getElementById("sy00").value;
      var font = document.getElementById("font").innerHTML;
      var wrong = document.getElementById("wrong").innerHTML;

      if(sy00.length == 0){
        producePromt(wrong + " School year is required!", "commentSYPromt", "#e60000");
        return false;
      }
        producePromt(font + sy00 + "!", "commentSYPromt", "#00802b");
        return true;
      }

      function jsShow(id){
        document.getElementById(id).style.display = "block";
      }
      function jsHide(id){
        document.getElementById(id).style.display = "none";
      }
      function validateSubmitFormSy(){
      var ajaxObject = null;

      if(!validateSy()){
        jsShow("submitPromtsy");
        producePromt("All form must be valid before submitting!", "submitPromtsy", "#e60000"); 
        setTimeout(function(){jsHide("submitPromtsy");}, 3000);
      }

      else if(window.XMLHttpRequest)
        ajaxObject = new XMLHttpRequest();

      else if(window.ActiveXObject)
        ajaxObject = new ActiveXObject("Microsoft.XMLHTTP");

          if(ajaxObject != null){
              var sy00 = document.getElementById("sy00").value;
              var program = document.getElementById("program").value;
              var params = "sy=" + sy00;

              ajaxObject.open("POST", "sy_db.php", true);
              ajaxObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              ajaxObject.send(params);
          }
          else
              alert("Failed to add S.Y!");

        ajaxObject.onreadystatechange = function()
        {
          if(ajaxObject.readyState == 4 && ajaxObject.status == 200)
          {

            //document.getElementById("formTitle").innerHTML = "REGISTERED SUCCESSFULLY!";
            //document.getElementById("formTitle").style.color = "green";            
            window.alert('New S.Y. added!');
            
            window.location.href='scheduling.php';
          }

          
        }     
      }
</script>


<!-- SECTION-->

  <div class="modal fade modal-fullscreen" id="section-modal-1" tabindex="-1" role="dialog" aria-labelledby="modalLargeLabel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="modalLargeLabel"> Adding Section</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container-fluid box">
              <form method="post" action="section_db.php">
                 <div class="container-fluid">  
                   <div class="container-fluid">
                    <br>
                     <input type="hidden" name="section_id" class="form-control" id="section_id"> 
                        <div id="font" class="hid">
                            <i class="fas fa-check"></i>
                        </div>
                        <div id="wrong" class="hid">
                            <i class="fas fa-times"></i>
                        </div>

                     <div class="row ">
                        <div class="col-sm-12 inputBox">
                          <input type="text" class="form-control" name="section" id="section" onkeyup="validateMajor()" required=""/>
                          <label id="commentMajorPromt">Section</label> 
                        </div>                                
                     </div>
                     <br>  

                   </div>
                 </div>  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <label id="submitPromt" style="text-align: center; font-size: 15px;"></label>
                    <button type="submit" name="section_btn" id="section_btn" class="btn btn-success btn-sm"><i class="fa fa-save"></i> | Save</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> | Cancel</button>
                </div>
                 </form>
              </div> 
            </div>
          </div>
        </div>
      </div>
