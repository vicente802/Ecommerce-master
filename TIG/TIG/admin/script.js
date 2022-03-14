$(function(){

	$('#username').on('keyup', function(){
		 var username = $(this).val();
		 var $input = $(this);	

		 if(username) {
		 		$.ajax({
			 	url:'check_val.php',
			 	method: 'get',
			 	data: {username:username},
			 	success: function(response){

			 		response = $.parseJSON(response);

			 		if(response.status == 'success'){

			 			$input.css('border', 'solid 2px red');
			 			$('#status').text('Username is already taken!');	
			 			return false;
			 		}
			 		else{
			 			$input.css('border', 'solid 2px green');
						$('#status').text('');	
			 		}

			 		console.log(response)
			 	}
			 });
		 }
	});

});