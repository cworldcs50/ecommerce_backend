<?php
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");

getAllData("cart_view", "user_id = ?", array($userId));