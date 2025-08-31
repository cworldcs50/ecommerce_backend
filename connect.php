<?php
$host = "yamanote.proxy.rlwy.net";
$db   = "railway";
$user = "root";
$pass = "taNAXAfhzpinRjaROAzsrduWenWUaKmD";
$port = 17225;
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
);

$dsn = "mysql:host=$host;dbname=$db;port=$port";

try {
    include_once __DIR__ . "/functions.php";
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
