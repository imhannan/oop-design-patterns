<?php

class Cart
{
    private array $products = [];
    public function addProducts($products)
    {
        // Product adding codes goes here
        echo "adding products...\n";
        $this->products = $products;
    }

    public function getProducts():array
    {
        // Product retrieval codes goes here
        echo "getting products...\n";
        return $this->products;
    }
}

class Order
{
    public function process($products)
    {
        // Order processing codes goes here
        echo "processing order for...\n";

        foreach ($products as $product){
            echo $product['name'].PHP_EOL;
        }
    }
}

class Payment
{
    public function charge($charge)
    {
        // Additional charge codes goes here
        echo "charging $charge...\n";
    }

    public function makePayment()
    {
        // Payment method verify & payment codes goes here
        echo "making payment....\n";
    }
}

class Shipping
{
    public function calculateCharge()
    {
        // Calculation codes goes here
        echo "calculating charge...\n";
    }

    public function shipProducts()
    {
        // Ship process codes goes here
        echo "shipping products...\n";
    }
}

class CustomerFacade
{
    public function __construct(public Cart $cart,public Order $order,public Payment $payment,public Shipping $shipping,)
    {

    }

    public function addToCart($products)
    {
        $this->cart->addProducts($products);
    }

    public function checkout()
    {
        $products = $this->cart->getProducts();

        $this->order->process($products);
    }

    public function makePayment()
    {
        $this->shipping->calculateCharge();
        $this->payment->charge(5000);

        $this->payment->makePayment();

        if (true) {
            $this->shipping->shipProducts();
        }
    }
}

$customer = new CustomerFacade(new Cart(),new Order(),new Payment(),new Shipping());

$products = [
    [
        'name' => 'Polo T-Shirt',
        'price' => 40,
    ],
    [
        'name' => 'Smart Watch',
        'price' => 400,
    ],
];

$customer->addToCart($products);
$customer->checkout();
$customer->makePayment();