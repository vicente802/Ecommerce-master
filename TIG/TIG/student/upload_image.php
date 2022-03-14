<?php
	include('connect.php');
	include('session.php');

	$fileInfo = PATHINFO($_FILES["image"]["name"]);

	if (empty($_FILES["image"]["name"])){
		$location="";
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png" OR 
			$fileInfo['extension'] == "PNG" OR $fileInfo['extension'] == "JPG" OR $fileInfo['extension'] == "JPEG" OR $fileInfo['extension'] == "jpeg") {

				$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
				move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
				$location = "upload/" . $newFilename;
		}else{
			$location="";
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}

	$db = mysqli_query($conn,"insert into image (userid, image) values ('".$_SESSION['id']."', '$location')");
		$userid=mysqli_insert_id($conn);


	if(empty($db)){
		?>
		<script>
			window.location.href='student_account.php';
		</script>
<?php	} else {
			?>
		<script>
			window.location.href='student_account.php';
		</script>
<?php } ?>	