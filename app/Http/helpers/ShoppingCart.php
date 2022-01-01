<?php


namespace App\Http\helpers;

use Gloudemans\Shoppingcart\Facades\Cart;

abstract class ShoppingCart {
    
    public function add($itemdetail,$qty)
    {
        Cart::setGlobalTax(0);

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
}