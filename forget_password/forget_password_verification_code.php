<?php
include_once  __DIR__ . "/../connect.php";
include_once __DIR__ . "/../send_mail.php";

$verificationCode = rand(10000, 99999);
$userEmail = filterRequest("userEmail");

$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ?");
$stmt->execute(array($userEmail));
$count = $stmt->rowCount();

if ($count > 0) {
    $data = array("users_verfiycode" => $verificationCode);

    updateData("users", $data, "users_email = '$userEmail'");
    sendMail($userEmail, "Verfication Code To Reset Password", "Enter This Code" . "\n", $userVerificationCode);
} else
    printFailure("Vefication Code is not correct!");
