<?php
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");

getAllData("notifications", "notification_user_id = ?", array($userId));
