<?php

include_once  __DIR__ . "/../connect.php";

$userPassword = sha1(filterRequest("userPassword"));
$userEmail = filterRequest("userEmail");
getData("users", "`users_password` = ? AND `users_email` = ? AND `users_approve` = '1'", array($userPassword, $userEmail));
