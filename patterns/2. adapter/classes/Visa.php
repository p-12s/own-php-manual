<?php

class Visa
{
    public function __construct()
    {
        // code
    }

    public function doPayment($amount)
    {
        echo "Paying via Visa: ". $amount . "<br>";
    }
}