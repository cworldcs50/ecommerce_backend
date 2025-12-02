<?php
include_once  __DIR__ . "/../connect.php";

$userId = filterRequest("user_id");
$categoryId = filterRequest("category_id");

$query = "SELECT items_view.*, 1 AS is_favorite
FROM items_view INNER JOIN favorites ON favorites.favorites_items_id = items_view.items_id
INNER JOIN users ON favorites.favorites_users_id = ? 
WHERE items_view.categories_id = ?
UNION ALL
SELECT items_view.*, 0 AS is_favorite FROM items_view
WHERE items_view.categories_id = ? AND items_view.items_id NOT IN ( SELECT items_view.items_id FROM items_view INNER JOIN favorites
ON favorites.favorites_items_id = items_view.items_id
INNER JOIN users ON favorites.favorites_users_id = ?);";

$stmt = $con->prepare($query);
$stmt->execute(array($userId, $categoryId, $categoryId, $userId));
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "items" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
