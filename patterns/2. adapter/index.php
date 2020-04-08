<?php

function __autoload($class_name)
{
    include 'classes/'. $class_name .'.php';
}

//$paypal = new PayPal();
//$paypal->sendPayment(100);

$paypal = new PayPalAdapter();
$paypal->pay(150);

$visa = new VisaAdapter();
$visa->pay(150);
