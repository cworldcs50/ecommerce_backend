<?php
include_once  __DIR__ . "/../connect.php";

$userEmail = filterRequest("userEmail");
$userVerifyCode = filterRequest("userVerficationCode");

$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND users_verfiycode = ?");
$stmt->execute(array($userEmail, $userVerifyCode));
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    printFailure("Vefication Code is not correct!");
}
