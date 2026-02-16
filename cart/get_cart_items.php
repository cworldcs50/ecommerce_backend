<?php
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");

getData("cart", "user_id = ? and is_added_orders = 0", array($userId));