<?php

include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");
$itemId = filterRequest("itemId");


$stmt = $con->prepare("SELECT COUNT(cart_id) FROM cart where user_id = ? and cart_item_id = ?;");
$stmt->execute(array($userId, $itemId));
$count = $stmt->rowCount();
$value = $stmt->fetchColumn();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $value));
} else {
    echo json_encode(array("status" => "success", "data" => "0"));
}
