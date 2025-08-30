<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';
include_once(__DIR__ . "/functions.php");

function sendMail($to, $from, $subject, $title, $verificationCode)
{
    $mail = new PHPMailer(true);

    try {
        //server settings
        $mail->isSMTP();
        $mail->Host = "smtp.sendgrid.net";
        $mail->SMTPAuth = true;
        $mail->Username = "apikey";
        $mail->Password = getenv("SENDGRID_API_KEY");
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;


        $mail->setFrom($from, "Ecommerce App");
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "
            <h2>$title</h2>
            <p>Your verification code is: <strong>`$verificationCode`</strong></p>
        ";
        $mail->AltBody = "Your verification code is: `$verificationCode`";


        $mail->send();
        echo json_encode(array("status" => "Message has been sent successfully ✅"));
    } catch (Exception $e) {
        printFailure("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}
