<?php

class ProductOrderFacade
{
    public $productId = '';

    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function generateOrder()
    {
        if($this->qtyCheck())
        {
            // add product to cart
            $this->addToCart($this->productId);
            // calculate shipping charge
            $this->calculateShipping();
            // calculate discount
            $this->calculateDiscount();
            // save order
            $this->saveOrder();
        }
    }

    private function qtyCheck()
    {
        // check in db
        return 100;
    }

    private function addToCart($productId)
    {
        $addToCart = new AddToCart($productId);
    }

    private function calculateShipping()
    {
        // calculate shipping charge
        $shipping = new ShippingCharge();
        $shipping->updateCharge();
    }

    private function calculateDiscount()
    {
        // calculate discount
        $discount = new Discount();
        $discount->applyDiscount();
    }

    private function saveOrder()
    {
        // save order
        $order = new Order();
        $order->generateOrder();
    }

}
