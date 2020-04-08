<?php


class PayPalAdapter implements PaymentInterface
{
    private $paypal;

    public function __construct()
    {
        $this->paypal = new PayPal();
    }

    public function pay($amount)
    {
        $this->paypal->sendPayment($amount);
    }
}
