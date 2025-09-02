<?php
include_once  __DIR__ . "/../connect.php";

$userEmail = filterRequest("userEmail");
$userNewPassword = sha1(filterRequest("userNewPassword"));
$data = array("users_password" => $userNewPassword);

$oldPassword = getOldPassword($userEmail);

if ($oldPassword == $userNewPassword) {
    echo json_encode(array("status" => "same password"));
} else {
    updateData("users", $data, "`users_email` = '$userEmail'");
}

function getOldPassword($userEmail)
{
    global $con;

    $stmt = $con->prepare("SELECT `users_password` FROM `users` WHERE `users_email` = '$userEmail'");
    $stmt->execute();
    $oldPassword = $stmt->fetchColumn();

    return $oldPassword;
}
