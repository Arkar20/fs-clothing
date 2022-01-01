<?php

namespace App\Http\Cart;

class ShoppingCart{

    private $itemdetail;
   
    // add new cart
    public function add()
    {
         Cart::add([
            'id' => $itemdetail->id,
            'name' => $itemdetail->getItemName(),
            'qty' => $qty,
            'price' => $itemdetail->item->price,
            'weight' => 0,
            'options' => [
                'size' => $itemdetail->getItemSize(),
                'color' => $itemdetail->getItemColor(),
            ],
        ]);
    }

    // checking the validity

    // configuring the price 

    // removing the cart  
    
}