<?php
include 'head.php';

$products_cart = isset($_COOKIE['products_cart']) ? unserialize($_COOKIE['products_cart']) : [];
$carted_prod = $_REQUEST['prod_id'] ?? null;

/**
 * ? Adding to cart works, probably
 * https://youtu.be/QwuWkKGcvVY
 * me rn
 */
$product_query = "SELECT * FROM products";
$product_search = mysqli_query($lazada, $product_query);
$product_list = mysqli_fetch_all($product_search);
foreach ($product_list as $key => $product) {
    $product_id = $product[0];
    $product_category = $product[1];
    $product_name = $product[2];
    $product_description = $product[3];
    $product_image = $product[5];
    $product_quantity = $product[6];
    $product_price = $product[8] > 0 ? $product[8] : $product[7];
    if ($carted_prod == $product_id) {
        /**
         * Checks if product id is in products_cart and gets the key for the array containing said product
         */
        $in_cart = false;
        foreach ($products_cart as $key2 => $product2) {
            if ($product_id == $product2[0]) {
                $in_cart = true;
                $cart_id = $key2;
            }
        }

        /**
         * adds newly carted product to products_cart, with quantity 1
         * 
         * if product is already in products_cart, increments quantity by 1
         */
        if ($in_cart === false) {
            $products_cart[] = [$product_id, $product_category, $product_name, $product_description, $product_image, $product_quantity, $product_price, 1];
            echo 'in_cart == false <br>';
        } else {
            $carted_quantity = $products_cart[$cart_id][7];
            $products_cart[$cart_id] = [$product_id, $product_category, $product_name, $product_description, $product_image, $product_quantity, $product_price, $carted_quantity + 1];
            echo 'in_cart == true <br>';
        }
        setcookie("products_cart", serialize($products_cart), time() + 86400, '/');
        print_r($products_cart);
    }
}
?>