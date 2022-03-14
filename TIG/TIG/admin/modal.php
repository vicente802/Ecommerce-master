 <head>
     <style>
         .modal {
          bottom: 0;
          left: 0;
          margin: auto;
          max-height: 620px;
          max-width: 600px;
          min-width: 300px;
          position: fixed;
          right: 0;
          top: 0;
        }
         .modal2 {
          bottom: 0;
          left: 0;
          margin: auto;
          max-height: 620px;
          max-width: 600px;
          min-width: 300px;
          position: fixed;
          right: 0;
          top: 0;
        }

     </style>
 </head>

<!-- Edit Admin Profile Modal -->
<div class="modal fade" id="edit_<?php echo $acrow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" style="width:100%">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #990000">
          <h4 class="modal-title" id="formTitle" style="color: white"><i class="fas fa-user-edit"></i> Edit Account</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <?php
              $sq=mysqli_query($conn,"select * from admin left join user on user.userid=admin.userid where user.userid='".$_SESSION['id']."'");
              $arow1=mysqli_fetch_array($sq);
          ?><br>
        <div class="bgimg3" >
            <div id="font" class="hid">
                <i class="fas fa-check"></i>
            </div>
            <div id="wrong" class="hid">
                <i class="fas fa-times"></i>
            </div>
            <div class="centerdiv3">
                <form method="POST" action="edit_prof.php?id=<?php echo $arow1['userid']; ?>">
                    <div class="form-group input-group regBox3">
                        <input type="text" style="background-color: #f5f5f0;" class="form-control inputbox3" id="username2"  name="username" value="<?php echo ($arow1['username']); ?>" onkeyup="validateUname2()" required="">
                        <label id="commentUnamePromt2">Username:</label>
                    </div>
                        <br>
                    <div class="form-group input-group regBox3">
                        <input type="text" style="background-color: #f5f5f0;" class="form-control" name="fullname1" id="fullname2" value="<?php echo ucwords($arow1['fullname']); ?>" onkeyup="validateFullname2()" required="">
                        <label id="commentFullnamePromt2" class="input-group-addon">Fullname:</label>
                    </div>
                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" name="image1" id="image" value="<?php echo ucwords($arow1['image']); ?>" >
                        <br>
                    <div class="form-group input-group regBox3">
                        <input type="text" style="background-color: #f5f5f0;" class="form-control" id="contact_number2" name="contact_number1" value="<?php echo ucwords($arow1['contact_number']); ?>" onkeyup="validatenum2()" required="">
                        <label id="commentnumPromt2" class="input-group-addon">Contact Number:</label>
                    </div>
                        <br>
                    <div class="form-group input-group regBox3">
                        <input type="password" style="background-color: #f5f5f0;" class="form-control" id="password2" name="password1" value="<?php echo ($arow1['password']); ?>" onkeyup="validatepword2()" required="">
                        <label id="commentpwordPromt2" class="input-group-addon">Password:</label>
                    </div>
                    <div class="form-group input-group regBox3">
                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" name="id" id="id" value="<?php echo ($arow1['id']); ?>">
                    </div>
                  </form>
                 <div style="text-align:left;">
                        <label id="commentPromt2" style="text-align: center;"></label>
                        <button type="submit" class="btn btn-success btn" id="btnsub" name="btnsub" onclick="validateCommentForm2()"><i class="fa fa-save"></i> Save Changes</button>
                </div>
            </div>
        </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer" style="background-color: #990000">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 30%;"> <i class="fas fa-window-close"></i> Cancel</button>
        </div>

      </div>
    </div>
</div>

<!-- Edit Student profile image Modal -->

<div class="modal fade modal2" id="edit1<?php echo $acrow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" style="width:100%">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #990000">
          <h4 class="modal-title" id="formTitle" style="color: white"><i class="fas fa-user-edit"></i> Choose Image</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <?php
              $sqed=mysqli_query($conn,"select * from admin left join user on user.userid=admin.userid where user.userid='".$_SESSION['id']."'");
              $edrow=mysqli_fetch_array($sqed);
          ?><br>
        <div class="bgimg3" >
            <div class="centerdiv3">
                <form method="POST" action="edit_prof.php?id=<?php echo $edrow['userid']; ?>" enctype="multipart/form-data">
                    <div class="form-group input-group regBox3">
                        <input type="file" style="background-color: #f5f5f0;" class="form-control inputbox3" id="image"  name="image" value="<?php echo ($edrow['image']); ?>">
                    </div>
                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control inputbox3" id="username1"  name="username" value="<?php echo ($edrow['username']); ?>" >

                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" name="fullname" id="fullname1" value="<?php echo ucwords($edrow['fullname']); ?>" >

                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" id="contact_number1" name="contact_number" value="<?php echo ucwords($edrow['contact_number']); ?>" >

                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" id="password1" name="password" value="<?php echo ($edrow['password']); ?>">
                        <input type="hidden" style="background-color: #f5f5f0;" class="form-control" name="id" id="id" value="<?php echo ($edrow['id']); ?>">
                 <div style="text-align:left;">
                        <label id="commentPromt2" style="text-align: center;"></label>
                        <button type="submit" class="btn btn-success btn" id="btnsub" name="btnsub" ><i class="fa fa-save"></i> Upload</button>
                </div>
            </form>
            </div>
        </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer" style="background-color: #990000">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 30%;"> <i class="fas fa-window-close"></i> Cancel</button>
        </div>

      </div>
    </div>
</div>
