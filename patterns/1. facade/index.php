<?php

function __autoload($class_name)
{
    include 'classes/'. $class_name .'.php';
}

// simple checkout proccess
$productID = $_GET['productID'];

$qtyCheck = new ProductQty();

if ($qtyCheck->checkQty($productID) > 0) {
    // add product to card
    $addToCart = new AddToCart($productID);

    // calculate shippng charge
    $shipping = new ShippingCharge();
    $shipping->updateCharge();

    // calculate discount
    $discount = new Discount();
    $discount->applyDiscount();

    // save order
    $order = new Order();
    $order->generateOrder();
}