<?php

class Product
{
    private int $id;
    private string $name;
    private float $price;
    private int $availableQuantity; //needs to be changed

    public function __construct($id, $name, $price, $availableQuantity)
    {
        $this->id = $id;
        $this->name = $name; 
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId()
    {
        return $this->id;
    }
    
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice()
    {
        return $this->price;
    }

    public function getAvailableQuantity()
    {
        return $this->availableQuantity;
    }

    public function setAvailableQuantity()
    {
        return $this->availableQuantity;
    }

    public function addToCart(Cart $cart, int $quantity)
    {
        return $cart->addProduct($this, $quantity);
    }
    public function removeFromCart(Cart $cart)
    {
        $cart->removeProduct($this);
    }
}