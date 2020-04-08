<?php

function __autoload($class_name)
{
    include 'classes/'. $class_name .'.php';
}

// need protection for sql-injection
$productID = $_GET['productID'];

$order = new ProductOrderFacade($productID);
$order->generateOrder();
