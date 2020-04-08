<?php


class VisaAdapter implements PaymentInterface
{
    private $visa;

    public function __construct()
    {
        $this->visa = new Visa();
    }

    public function pay($amount)
    {
        $this->visa->doPayment($amount);
    }
}
