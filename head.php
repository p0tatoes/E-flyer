<?php
$host = "localhost";
$database = "Lazada";
$db_login = "root";
$db_pass = "";

$shopee = mysqli_connect($host, $db_login, $db_pass, $database) or die($dlink->error);

$store_products = [
    [
        "id" => 1,
        "name" => "man t-shirt",
    ],
    [
        "id" => 2,
        "name" => "man polo shirt",
    ],
    [
        "id" => 3,
        "name" => "woman dress",
    ]
];

$products_cart = [];

$carted_prod = $_REQUEST['prod_id'] ?? null;

if ($carted_prod == 1) {
    // increase quantity of man t-shirt in the cart by 1
}

if ($carted_prod == 2) {
    // increase quantity of man polo shirt in the cart by 1
}

if ($carted_prod == 3) {
    // increase quantity of woman dress in the cart by 1
}

?>