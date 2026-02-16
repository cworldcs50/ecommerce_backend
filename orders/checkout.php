<?php
include_once  __DIR__ . "/../connect.php";

$ordersPrice = filterRequest("ordersPrice");
$ordersUserId = filterRequest("ordersUserId");
$ordersAddressId = filterRequest("ordersAddressId");
$ordersDeliveryType = filterRequest("ordersDeliveryType");
$ordersPaymentMethod = filterRequest("ordersPaymentMethod");
$isOrdersApplyCoupon = filterRequest("isOrdersApplyCoupon");
$ordersDeliveryPrice = filterRequest("ordersDeliveryPrice");
$couponDiscount = filterRequest("couponDiscount");

$now = date("Y-m-d H:i:s");

if ($ordersDeliveryType == 1) {
    $ordersDeliveryPrice = 0;
}

$couponCheckExpiration = getData(
    "coupon",
    "coupon_id = ? AND coupon_expiration_date > ? AND coupon_count > 0",
    array($isOrdersApplyCoupon, $now),
    false
);

if ($couponCheckExpiration > 0) {
    $ordersPrice = $ordersPrice - $ordersPrice * $couponDiscount / 100;
    $stmt = $con->prepare("UPDATE coupon SET coupon_count = coupon_count - 1 WHERE coupon_id = ?");
    $stmt->execute(array($isOrdersApplyCoupon));
}

$data = array(
    "orders_price" => $ordersPrice,
    "orders_user_id" => $ordersUserId,
    "orders_address_id" => $ordersAddressId,
    "orders_delivery_type" => $ordersDeliveryType,
    "orders_payment_method" => $ordersPaymentMethod,
    "orders_delivery_price" => $ordersDeliveryPrice,
    "is_orders_apply_coupon" => $isOrdersApplyCoupon,
    "orders_total_price" => $ordersPrice + $ordersDeliveryPrice
);

$count = insertData("orders", $data, false);

if ($count > 0) {
    $stmt = $con->prepare("SELECT max(orders_id) FROM orders WHERE orders_user_id = ?");
    $stmt->execute(array($ordersUserId));
    $maxOrderId = $stmt->fetchColumn();

    $result = updateData(
        "cart",
        array("is_added_orders" => $maxOrderId),
        "is_added_orders = 0 AND user_id = $ordersUserId",
        false
    );


    if ($result > 0) {
        echo json_encode(array("status" => "success", "message" => "order placed successfully"));
    } else {
        echo json_encode(array("status" => "failure", "message" => "order not placed"));
    }
} else {
    echo json_encode(array("status" => "failure", "message" => "order not placed"));
}
