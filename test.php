<?php
include_once __DIR__ . "/send_mail.php";

getAllData("users", "user_name = ?", ["ahmed"]);
