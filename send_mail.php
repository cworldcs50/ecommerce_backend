<?php

require __DIR__ . '/vendor/autoload.php';
include_once(__DIR__ . "/functions.php");
include_once(__DIR__ . "/secrets.php");

use SendGrid\Mail\Mail;

function sendMail($to, $subject, $title, $verificationCode)
{
    $email = new Mail();
    $email->setFrom("mohamedomer2582004@gmail.com", "Ecommerce App");
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

    $sendgrid = new SendGrid("SENDGRID_API_KEY");

    $sendgrid->send($email);
}
