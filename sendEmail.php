<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['from']) && isset($_POST['to'])){
        $from = $_POST['from'];
        $to = $_POST['to'];
        $message = $_POST['message'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "bfoot171@gmail.com";
        $mail->Password = "greenmac20";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        $mail->isHTML(true);
        $mail->setFrom($to);
        $mail->addAddress("bfoot171@gmail.com");
        $mail->Subject = ("$to (Hello)");
        $mail->Body = $message;

        if ($mail->send()){
            $status = "Success";
            $response = "Email is sent";
        }
        else{
            $status = "failed";
            $response = "Email is not send". $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));

    }

?>