<?php
include_once __DIR__ . "/../connect.php";

$userId = filterRequest("userId");

getAllData("address", "address_userid = ?", array($userId));