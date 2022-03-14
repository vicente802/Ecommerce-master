<?php include('head.php'); ?>
<button type="submit" class="btn btn-danger btn-sm" id="btn-del"><i class="fa fa-trash"></i> | Delete</button>

<script>
  $('#btn-del').on('click' , function(e) {

    Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
)
  })

</script>