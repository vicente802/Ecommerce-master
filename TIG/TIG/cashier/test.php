<div class="container">
  <!-- Sign up modal -->
  <div class="modal fade" id="addAdminModal2" style="width: 100%;">
    <div class="modal-dialog modal-dialog-centered modal-md" style="width:100%">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #990000">
          <h4 class="modal-title" id="formTitle" style="color: white"><i class="fas fa-users-medical"></i> Add new admin</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" style="margin-top: -40px;">
          <div class="bgimg2">
      <div id="font" class="hid">
        <i class="fas fa-check"></i>
      </div>
      <div id="wrong" class="hid">
        <i class="fas fa-times"></i>
      </div>
      <div id="typing" class="hid">
        <i class="far fa-keyboard"></i>
      </div>
    <div class="centerdiv2">
        <form method="POST" action="add_admin_DB.php">    
          <div class="regBox">
            <input type="text" id="username" name="username" class="inputbox2" required="" onkeyup="validateUname00()">
            <label id="commentUnamePromt00">Username</label> 
          </div><br>
          <div class="regBox">
            <input type="text" id="fullname" name="fullname" class="inputbox2" required="" onkeyup="validateFullname00()">
            <label id="commentFullnamePromt00">Fullname</label>
          </div><br>
              <div class="regBox">
                <input type="text" class="inputbox2" id="contact_number" name="contact_number" required="" onkeyup="validatenum00()">
                <label id="commentnumPromt00">Contact Number</label>
              </div><br>
              <div class="regBox">
            <input type="password" name="password" id="password" class="inputbox2"required="" onkeyup="validatepword00()">
            <label id="commentpwordPromt00">Password</label> 
          </div><br>        
           <div class="regBox">
            <input type="password" name="cpassword" id="cpassword" class="inputbox2" required="" onkeyup="validateCpword00()">
            <label id="commentCpwordPromt00">Confirm Password</label>
          </div>            
          <div>
            <label id="commentPromt00" style="text-align: center;"></label>
            <button type="submit" class="btn btn-primary " onclick="validateCommentForm00()" name="btnsub" id="btnsub"><i class="fa fa-plus-circle"></i> Save user</button>
          </div>        
        </form>

        </div>
      </div>
        </div>  
        <!-- Modal footer -->
        <div class="modal-footer" style="background-color: #990000">
          <button type="button" class="btn btn-danger inputbox0" data-dismiss="modal" style="width: 30%;"> <i class="fas fa-window-close"></i> Cancel</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

  <script src="./jquery-3.1.0.js"></script>
          <script type="text/javascript">
              $(document).ready(function(){
                  $("#btnsub").click(function(){
                    
                  var fullname = $("#fullname").val();
                  var contact_number = $("#contact_number").val();
                  var username = $("#username").val();
                  var password = $("#password").val();
                  if($.trim(fullname).length > 0 & $.trim(contact_number).length > 0 & $.trim(username).length > 0 & $.trim(password).length > 0) {
                  $.ajax({
                      type:"POST",
                      url: "http://localhost/gs_enrolss_system/admin/add_admin_DB.php",   
                      data:{
                        fullname:fullname, 
                        contact_number:contact_number, 
                        password:password,
                        username:username,
                      },
                    cache:false,
                      success:function(data) {
                        alert('Successfully Submited!');
                        window.location = 'admin_user.php';
                        document.getElementById("txtHint").innerHTML = data;
                     }
                  })
                } 
                else {                    
                  alert('Input fields are empty');
                }
            })
        })

  </script>
