<?php

include_once  __DIR__ . "/connect.php";

$table = "users";
$userName = filterRequest("userName");
$userPassword = sha1(filterRequest("userPassword"));
$userEmail = filterRequest("userEmail");
$userPhone = filterRequest("userPhone");
$userVerificationCode = rand(10000, 99999);


$stmt = $con->prepare('SELECT * FROM `users` WHERE `users_phone` = ? OR  `users_email` = ?');
$stmt->execute(array($userPhone, $userEmail));
$count = $stmt->rowCount();

if ($count > 0) {
    printFailure("PHONE OR Email Already Exists!");
} else {
    $data = array(
        "users_name" => $userName,
        "users_email" => $userEmail,
        "users_phone" => $userPhone,
        "users_password" => $userPassword,
        "users_verfiycode" => $userVerificationCode,
    );

    sendMail($userEmail, "Verfication Code", "Enter This Code" . "\n", $userVerificationCode);

    $count = insertData($table, $data);
}
