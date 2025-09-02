<?php

include_once  __DIR__ . "/../connect.php";

$email = filterRequest("userEmail");

$stmt = $con->prepare("SELECT * FROM `users` WHERE `users_email` = ?");
$stmt->execute(array($email));
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    printFailure("email not found!");
}
