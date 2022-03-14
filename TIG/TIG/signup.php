<?php
    require_once "connect.php";

    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/SMTP.php";
    require "PHPMailer/src/PHPMailer.php";
    if(isset($_POST['emailSend'])){
        $email = $_POST['emailSend'];
        $pass = md5($_POST['passSend']);
        $lname = $_POST['lnameSend'];
        $fname = $_POST['fnameSend'];
        $position = 'User';
        $token = rand(100000, 999999);
        $qry = "INSERT INTO user (`fname`, `lname`, `email`, `password`, `position`, `token`) VALUES ('$fname', '$lname','$email', '$pass', '$position', '$token')";
        $result = mysqli_query($conn, $qry);

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        if($result) {
            $body = "your verification code is ".$token;
            $mail->isSMTP();
            $mail->header = "MIME-Version: 1.0"."\r\n";
            $mail->header = "Content-type: text/html;charset-UTF-8". "\r\n";
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "akfruitdealer@gmail.com";
            $mail->Password = "capstone";
            $mail->SMTPSecure = "tls";
            $mail->Port = "587";
            $mail->From = "akfruitdealer@gmail.com";
            $mail->FromName = "TIG";
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Email Verification";
            $mail->Body = $body;
            $mail->AltBody = $body;
            $mail->send();
        }
    }
?>