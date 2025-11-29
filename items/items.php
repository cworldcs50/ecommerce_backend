<?php
include __DIR__ . "/../connect.php";

$categoryId = filterRequest("categoryId");

$items = getAllData("items_view", "items_id = ?", array($categoryId));
