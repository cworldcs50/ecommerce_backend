<?php
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");
$itemId = filterRequest("itemId");

$count = getData(
    "cart", 
    "user_id = ? and cart_item_id = ? and is_added_orders = 0", 
    array($userId, $itemId), 
    false
);

$data = array("user_id" => $userId, "cart_item_id" => $itemId);

insertData("cart", $data);
