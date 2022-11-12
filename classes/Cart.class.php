<?php

/*
    - class Cart has property $items which stores Products that have been added to the Cart(array of cartItems).
    - when adding a Product to the Cart we first check if the item is already in the Cart, if (true) -> 
                                        we increase the quantity of that item by the $amount = $quantity (addProduct() parameter)
    - 

*/

class Cart
{   
    // $items[] - an associative array of ['id1' => class cartItems $cartItem1, 'id2' => $cartItem2...]
    private array $items = [];

    function addProduct(Product $product, int $quantity)
    {   
        if (!empty($this->items)){
            //if a CartItem with the same id as Product we want to add already exists in the cart -> increase quantity of that cartItem
            if (array_key_exists($product->getId(), $this->items)){
                $this->items[$product->getId()]->increaseQuantity($quantity);
            } else {
                //if the product was not found create new cartItem, add to the items[] array
                $cartItem = new CartItem($product, $quantity);
                return $this->items[$cartItem->getProduct()->getId()] = $cartItem;
            }
        } else {
            //if the array is empty, add new item
            $cartItem = new CartItem($product, $quantity);
            return $this->items[$cartItem->getProduct()->getId()] = $cartItem;
        } 
    }

    public function removeProduct(Product $product)
    {
        if (array_key_exists($product->getId(), $this->items)){
            unset($this->items[$product->getId()]);
        } else {
            throw new Exception("This item does not exist in the cart");
        }
    }
    function getTotalQuantity()
    {
        if (!empty($this->items)){
            $totalQuantity = 0;
            foreach ($this->items as $item){
                $totalQuantity += $item->getQuantity();
            }
            return $totalQuantity;
        } else {
            throw new Exception("The cart is empty");
        }
    }
    function getTotalSum()
    {
        if (!empty($this->items)){
            $totalSum = 0;
            foreach ($this->items as $item){
                $totalSum += $item->getProduct()->getPrice() * $item->getQuantity();
            }
            return $totalSum;
        } else {
            throw new Exception("The cart is empty");
        }
    }

    public function getItems(){
        return $this->items;
    }
    public function setItems(int $id, $cartItem){
        $this->items[$id] = $cartItem;
    }
}