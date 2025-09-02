<?php

include_once  __DIR__ . "/../connect.php";

$userPassword = sha1(filterRequest("userPassword"));
$userEmail = filterRequest("userEmail");

$stmt = $con->prepare("SELECT * FROM `users` WHERE `users_password` = ? AND `users_email` = ?");
$stmt->execute(array($userPassword, $userEmail));
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    printFailure("email or password are not correct");
}
