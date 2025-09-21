<?php

include_once(__DIR__ . "/connect.php");


$allData = array();

$allData["categories"] = getAllData("categories", null, null, false);
$allData["status"] = "success";

echo json_encode($allData);
