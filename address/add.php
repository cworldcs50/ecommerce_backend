<?php
include_once __DIR__ . "/../connect.php";

$lat = filterRequest("lat");
$city = filterRequest("city");
$long = filterRequest("long");
$userId = filterRequest("userId");
$street = filterRequest("street");
$name = filterRequest("name");

$data = array(
    "address_lat" => $lat,
    "address_long" => $long,
    "address_city" => $city,
    "address_street" => $street,
    "address_userid" => $userId,
    "name"  => $name
);

insertData("address", $data);
