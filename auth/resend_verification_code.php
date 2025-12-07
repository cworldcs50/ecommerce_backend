<?php
include_once __DIR__ . "/../connect.php";
// include_once __DIR__ . "/../functions.php";

$userEmail = filterRequest("userEmail");
$verificationCode = rand(10000, 99999);
$data = array("users_verfiycode" => $verificationCode);

updateData("users", $data, "users_email = '$userEmail'");

sendMail($userEmail, "Verfication Code", "Enter This Code" . "\n", $verificationCode);

// mail($userEmail, "Verfication Code", "Enter This Code" . "\n" . $verificationCode);
