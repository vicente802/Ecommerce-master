<?php
include('connect.php');
session_start();

if(isset($_POST['edit'])){

	$id=$_GET['id'];

	$ed = mysqli_query($conn, "SELECT * from student where userid = '$id'");
	$edrow = mysqli_fetch_array($ed);

	$ed1 = mysqli_query($conn, "SELECT * from user where userid = '$id'");
	$edrow1 = mysqli_fetch_array($ed1);

	$username=$_POST['username'];
	$password=$_POST['password'];
	$fullname=$_POST['fullname'];
	$contact_number=$_POST['contact_number'];

	$fileInfo = PATHINFO($_FILES["image"]["name"]);

	if ($password==$edrow1['password']){
		$password=$password;
	}
	else{
		$password=md5($password);
	}

	if (empty($_FILES["image"]["name"])){
		$location=$edrow['image'];
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png" OR
			$fileInfo['extension'] == "PNG" OR $fileInfo['extension'] == "JPG" OR $fileInfo['extension'] == "JPEG" OR $fileInfo['extension'] == "jpeg") {

				$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
				move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
				$location = "upload/" . $newFilename;
		}else{
			$location=$edrow['image'];
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}

	mysqli_query($conn,"update user set username='$username', password='$password' where userid='$id'");
	mysqli_query($conn,"update student set fullname='$fullname', contact_number='$contact_number', image='$location' where userid='$id'");

		?>
			<script>
				window.alert('Edit done!');
				window.history.back();
			</script>
		<?php
	
}	



?>
