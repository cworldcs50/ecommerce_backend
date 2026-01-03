<?php
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");
$itemId = filterRequest("itemId");

$count = getData("cart", "user_id = ? and cart_item_id = ?", array($userId, $itemId), false);

$data = array("user_id" => $userId, "cart_item_id" => $itemId);

if ($count > 0) { 
    updateData("cart", $data, "user_id = $userId and cart_item_id = $itemId");
} else { 
    insertData("cart", $data);
}
