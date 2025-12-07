<?php
include_once __DIR__ . "/send_mail.php";
include_once __DIR__ . "/functions.php";

$userPhone = filterRequest("userPhone");
$userEmail = filterRequest("userEmail");

$data = getAllData("users", "`users_phone` = ? OR `users_email` = ?", array($userPhone, $userEmail), false);

echo json_encode(array("data" => $data));
