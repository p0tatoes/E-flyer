<?php
$hostname = "localhost";
$database = "Lazada";
$db_login = "root";
$db_pass = "";

$dlink = mysql_connect($hostname, $db_login, $db_pass) or die("Could not connect");
mysql_select_db($database) or die("Could not select database");

$store_products = [
    [
        "id" => 1,
        "name" => "man t-shirt",
        "quantity" => $_COOKIE['m_tshirt']
    ],
    [
        "id" => 2,
        "name" => "man polo shirt",
        "quantity" => $_COOKIE['m_polo']
    ],
    [
        "id" => 3,
        "name" => "woman dress",
        "quantity" => $_COOKIE['w_dress']
    ]
];

if ($_REQUEST['prod_id'] == 1) {
    // increase quantity of man t-shirt in the cart by 1
}

if ($_REQUEST['prod_id'] == 2) {
    // increase quantity of man polo shirt in the cart by 1
}

if ($_REQUEST['prod_id'] == 3) {
    // increase quantity of woman dress in the cart by 1
}

?>