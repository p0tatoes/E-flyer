<?php
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

$products_cart = isset($_COOKIE['products_cart']) ? unserialize($_COOKIE['products_cart']) : [];
setcookie("products_cart", serialize($products_cart), time() + 86400, '/');
$carted_prod = $_REQUEST['prod_id'] ?? null;

/**
 * ADDING TO CART WORKS! but has error on first click
 */
if ($carted_prod == 1) {
    // increase quantity of man t-shirt in the cart by 1
    $added_product = $store_products[0];
    $prod_quantity = $products_cart[0]['quantity'] ?? 0;
    $added_product['quantity'] = $prod_quantity + 1;
    $products_cart[0] = $added_product;
    setcookie("products_cart", serialize($products_cart), time() + 86400, '/');
}

if ($carted_prod == 2) {
    // increase quantity of man polo shirt in the cart by 1
    $added_product = $store_products[1];
    $prod_quantity = $products_cart[1]['quantity'] ?? 0;
    $added_product['quantity'] = $prod_quantity + 1;
    $products_cart[1] = $added_product;
    setcookie("products_cart", serialize($products_cart), time() + 86400, '/');
}

if ($carted_prod == 3) {
    // increase quantity of woman dress in the cart by 1
    $added_product = $store_products[2];
    $prod_quantity = $products_cart[2]['quantity'] ?? 0;
    $added_product['quantity'] = $prod_quantity + 1;
    $products_cart[2] = $added_product;
    setcookie("products_cart", serialize($products_cart), time() + 86400, '/');
}

print_r($products_cart);
?>