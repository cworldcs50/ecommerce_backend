<?php
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");
$itemId = filterRequest("itemId");

deleteData("cart", "cart_id = (select cart_id from cart where user_id = $userId and cart_item_id = $itemId and is_added_orders = 0 LIMIT 1)");
