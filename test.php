<?php
include_once __DIR__ . "/functions.php";

sendFCM(
    "ecommerce", 
    "mohamed", 
    "users", 
    "ecommerce-ae40d-firebase-adminsdk-fbsvc-525328d7a7.json"
);

echo "sent";
