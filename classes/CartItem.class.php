<?php

class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct()
    {
        return $this->product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    
    public function setQuantity()
    {
        return $this->quantity;
    }

    public function increaseQuantity($amount = 1)
    {
        // cartItems quantity + $amount (new $quantity we trying to add) > cartItem_AvailableQuantity -> ERROR
        if ($this->getQuantity() + $amount > $this->getProduct()->getAvailableQuantity()){
            throw new Exception("Product quantity can not be more than " . $this->getProduct()->getAvailableQuantity());
        }
        $this->quantity += $amount;    
    }
    public function decreaseQuantity($amount = 1)
    {
        if ($this->getQuantity() - $amount < 1){
            throw new Exception("Product quantity can not be more than 1");
        }
        $this->quantity -= $amount;
    }
}