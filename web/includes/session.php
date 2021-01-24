<?php
include $_SERVER['DOCUMENT_ROOT'].'/product-data.php';


// start session
session_start();

function get_product($identifier, $products) {
    $products_key = array_search($identifier, array_column($products, 'identifier'));
    return $products[$products_key];
}

//initialize shopping cart
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}



//calculate shopping cart total
$cart_total = 0;
foreach($_SESSION['cart'] as $item) {
    $product = get_product($item['identifier'], $products);
    $cart_total = $cart_total + ($product['price'] * 1);
}

$cart_total = "$".number_format(($cart_total /100), 2, '.', ',');