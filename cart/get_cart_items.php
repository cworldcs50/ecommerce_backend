<?php
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");

getData("cart", "user_id = ?", array($userId));