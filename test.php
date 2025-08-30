<?php
include_once __DIR__ ."/send_mail.php";

$isSend = sendMail("mohamedomer2582004@gmail.com", "mohamedomer2582004@gmail.com", "Verify your account", "Welcome to Ecommerce App", "123456");

echo json_encode(
    array("status" => $isSend)
);
