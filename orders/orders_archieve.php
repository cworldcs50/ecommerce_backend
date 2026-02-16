<?php
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");

getAllData("orders", "orders_user_id = ? order by orders_creation_time DESC", array($userId));
