<?php

/*
    This project was created while following this tutorial:
    https://www.youtube.com/watch?v=1Ip7_hdSqzY
*/

include_once 'includes/autoloader.inc.php';
ini_set('log_errors', 1);
ini_set('display_errors', 0);

$product1 = new Product(1, "iPhone 11", 2500, 10);
$product2 = new Product(2, "M2 SSD", 400, 10);
$product3 = new Product(3, "Samsung Galaxy S20", 2200, 10);
$cart = new Cart();
$cartItem1 = $cart->addProduct($product1, 1);
$cartItem2 = $cart->addProduct($product2, 2);
$cartItem3 = $cart->addProduct($product2, 10);

$cartItem4 = $product3->addToCart($cart, 2);

echo "Number of items in cart: ";
echo $cart->getTotalQuantity() . PHP_EOL;  // this must print 9

echo "Total price of items in cart: ";
echo $cart->getTotalSum() . PHP_EOL; // = 8500

$cartItem2->increaseQuantity();
$cartItem2->increaseQuantity();
$cartItem4->decreaseQuantity();

echo "Number of items in cart: ";
echo $cart->getTotalQuantity() . PHP_EOL; 

echo "Total price of items in cart: ";
echo $cart->getTotalSum() . PHP_EOL; // = 7100
var_dump($cart->getItems()). PHP_EOL;


$cart->removeProduct($product1);

$product3->removeFromCart($cart);
var_dump($cart->getItems()). PHP_EOL;
