<?php 
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");
$notificationId = filterRequest("notificationId");

deleteData("notifications", "notification_user_id = $userId AND notification_id = $notificationId");