<?php
include_once  __DIR__ . "/../connect.php";

$userEmail = filterRequest("userEmail");
$userNewPassword = sha1(filterRequest("userNewPassword"));
$data = array("users_password" => $userNewPassword);

updateData("users", $data, "`users_email` = '$userEmail'");
