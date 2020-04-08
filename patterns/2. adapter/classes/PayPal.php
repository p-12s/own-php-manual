<?php

class PayPal
{
    public function __construct()
    {
        // code
    }

    public function sendPayment($amount)
    {
        echo "Paying via PayPal: ". $amount . "<br>";
    }
}