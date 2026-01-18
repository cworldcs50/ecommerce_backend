<?php
include_once  __DIR__ . "/../connect.php";


$searchKeywords = filterRequest("searchKeywords");

getAllData(
    "items_view",
    "items_name LIKE '%$searchKeywords%' OR 
    items_name_ar LIKE '%$searchKeywords%' OR 
    items_description LIKE '%$searchKeywords%' OR
    items_description_ar LIKE '%$searchKeywords%' OR 
    categories_name LIKE '%$searchKeywords%' OR 
    categories_name_ar LIKE '%$searchKeywords%'"
);
