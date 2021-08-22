<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['from']) && isset($_POST['to'])){
        $from = $_POST['from'];
        $to = $_POST['to'];
        $message = $_POST['message'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer;
        $mail->SMTPDebug = 4;
        $mail->isSMTP();
        $mail->Host = "server.web-hosting.com";
        $mail->SMTPAuth = true;
        $mail->Username = "bfoot171@gmail.com";
        $mail->Password = "greenmac20";
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";

        $mail->isHTML(true);
        $mail->setFrom($from, 'Must Funjabi');
        $mail->addAddress("bfoot171@gmail.com");
        $mail->Subject = 'First test';
        $mail->Body = $message;
        $send = $mail->send();
        if ($send){
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