<?php

include __DIR__ . "/../connect.php";

$userId = filterRequest("userId");
$itemId = filterRequest("itemId");

deleteData("favorites", "favorites_users_id = $userId AND favorites_items_id = $itemId");
