<?php
// index.php

$menuItems = [
    ["title" => "gelato avocado", "price" => 20000, "image" => "img/gelato_avocado.jpg"],
    ["title" => "gelato banana", "price" => 15000, "image" => "img/gelato_banana.jpg"],
    ["title" => "gelato blackforest", "price" => 25000, "image" => "img/gelato_blackforet.jpg"],
    ["title" => "gelato cookies and cream", "price" => 22000, "image" => "img/gelato_cookies_and_cream.jpg"],
];

header('Content-Type: application/json');
echo json_encode($menuItems);


?>
