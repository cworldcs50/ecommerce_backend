<?php

include_once(__DIR__ . "/connect.php");


$allData = array();

$allData["categories"] = getAllData("categories", null, null, false);
$allData["categories"] = getAllData("items", "items_discount != 0", null, false);
$allData["status"] = "success";


echo json_encode($allData);
