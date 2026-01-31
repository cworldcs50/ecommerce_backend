<?php
include_once  __DIR__ . "/../connect.php";

$couponName = filterRequest("couponname");
$now = date("Y-m-d H:i:s");

getData(
    "coupon",
    "coupon_name = ? AND coupon_expiration_date > ? AND coupon_count > 0",
    array($couponName, $now)
);
