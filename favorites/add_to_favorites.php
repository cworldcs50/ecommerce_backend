<?php

include __DIR__ . "/../connect.php";

$userId = filterRequest("userId");
$itemId = filterRequest("itemId");

$data = array("favorites_users_id" => $userId, "favorites_items_id" => $itemId);

insertData("favorites", $data);
