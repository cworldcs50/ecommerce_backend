<?php

require __DIR__ . '/vendor/autoload.php';
include_once(__DIR__ . "/functions.php");

use SendGrid\Mail\Mail;

function sendMail($to, $from, $subject, $title, $verificationCode)
{
    $email = new Mail();
    $email->setFrom($from, "Ecommerce App");
    $email->setSubject($subject);
    $email->addTo($to);
    $email->addContent(
        "text/html",
        "
            <h2>$title</h2>
            <p>Your verification code is: <strong>$verificationCode</strong></p>
        "
    );
    $email->addContent(
        "text/plain",
        "Your verification code is: $verificationCode"
    );
    echo json_encode(array("key" => getenv("SENDGRID_API_KEY")));

    $sendgrid = new \SendGrid(getenv("SENDGRID_API_KEY"));

    try {
        $response = $sendgrid->send($email);

        if ($response->statusCode() >= 200 && $response->statusCode() < 300) {
            echo json_encode(array("status" => "success", "message" => "Message has been sent successfully ✅"));
        } else {
            printFailure("SendGrid error: " . $response->statusCode() . " - " . $response->body());
        }
    } catch (Exception $e) {
        printFailure("Message could not be sent. Error: " . $e->getMessage());
    }
}
