<?php
include __DIR__ . "/../connect.php";

$itemsCategory = filterRequest("itemsCategory");

$items = getAllData("items_view", "items_category = ?", array($itemsCategory));
