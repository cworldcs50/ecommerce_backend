<?php
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("userId");

$data = getAllData("cart_view", "user_id = ?", array($userId), false);

$stmt = $con->prepare(
    "SELECT SUM(cart_view.item_total_price) as total_price, COUNT(cart_view.no_item) as total_count 
    FROM cart_view 
    WHERE cart_view.user_id = ? and cart_view.is_added_orders = 0
    GROUP BY cart_view.user_id;"
);

$stmt->execute(array($userId));

$dataCountAndPrice = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(
    array(
        "cartData" => $data,
        "CountAndPriceData" => $dataCountAndPrice
    )
);
