<?php
include('connect.php');

if (isset($_POST['schedbtn'])) {

  $course=$_POST['course'];
  $course_num=$_POST['course_num'];
  $major=$_POST['major'];
  $subject=$_POST['subject'];
  $subject_title=$_POST['subj_title'];
  $semester=$_POST['semester'];
  $sy=$_POST['sy'];
  $instructor=$_POST['instructor'];
  $timein=$_POST['timein'];
  $timeout=$_POST['timeout'];
  $room=$_POST['room'];
  $units_lec=$_POST['units_lec'];
  $units_lab=$_POST['units_lab'];

    $sql = "SELECT * FROM schedule WHERE programs='$course' AND major_id='$major' AND time_in='$timein' AND time_out='$timeout' AND school_yr_id='$sy' AND sem_id='$semester' AND room='$room' AND instructor_id='$instructor' AND subjects='$subject' ";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {

       echo "<script> alert('SORRY!! The Schedule is already exists! Please try Again..')</script>";
       echo "<script>window.location = 'scheduling.php'</script>";

    }else{

        mysqli_query($conn,"insert into schedule (programs, course_num, major_id, subjects, subject_title, instructor_id, time_in, time_out, sem_id, school_yr_id, room, units_lec, units_lab) values ('$course', '$course_num','$major','$subject','$subject_title','$instructor','$timein','$timeout','$semester','$sy', '$room','$units_lec','$units_lab')");

    $schedule_id=mysqli_insert_id($conn);

        mysqli_query($conn, "insert into limit_student (course_no, subject_title, schedule_id, school_yr_id, sem_id, limit_student) values ('$course_num', '$subject_title', '$schedule_id', '$sy', '$semester', '50') ");

          echo "<script> alert('New Schedule added!')</script>";
          echo "<script>window.location = 'scheduling.php'</script>";
        ?>
    <?php }
}

?>  
