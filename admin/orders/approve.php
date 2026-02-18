<?php
include_once  __DIR__ . "/../../connect.php";

$orderId = filterRequest("orderId");
$userId = filterRequest("userId");
$data = array("orders_status" => 1);

$result = updateData("orders", $data, "orders_id = $orderId AND orders_status = 0");

insertNotification(
    "order approved!", 
    "order number $orderId approved and our service start preparing it", 
    $userId,
    "users$userId",
    "../../ecommerce-ae40d-firebase-adminsdk-fbsvc-525328d7a7.json",
);
