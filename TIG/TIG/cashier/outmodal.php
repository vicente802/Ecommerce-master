
  <div class="modal fade modal-fullscreen" id="logout" tabindex="-1" role="dialog" aria-spanledby="modalLargespan">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h4 class="modal-title" id="myModalLabel">Logging out...</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<div class="container-fluid">
				<h6><center>Are you sure you want to logout?</center></h6>
				<h6><center>Account: <strong><?php echo $fullname; ?></strong></center></h6> 
              </div> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <a href="logout.php" class="btn btn-danger">Logout</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>  

