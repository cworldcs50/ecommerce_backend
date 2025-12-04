<?php 
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");

$favorite_items = getAllData("favorites_view", "users_id = $userId");