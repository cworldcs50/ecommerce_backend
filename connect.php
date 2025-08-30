<?php

$host = "yamanote.proxy.rlwy.net";
$db   = "railway";
$port = 17225;
$user = "root";
$password = "taNAXAfhzpinRjaROAzsrduWenWUaKmD";

$dsn = "mysql:host=$host;dbname=$db;port=$port;charset=utf8";

$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8" //FOR SUPPORTING ARABIC LANGUAGE
);


//connection code
try {
    $con = new PDO($dsn, $user, $password, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    include __DIR__ . "/functions.php";
} catch (PDOException $e) {
    echo json_encode([
        "status" => "failure",
        "error" => $e->getMessage()
    ]);
}
