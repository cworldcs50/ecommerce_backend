<?php
include_once __DIR__ . "/../connect.php";

$addressId = filterRequest("addressId");

deleteData("address", "address_id = $addressId");
