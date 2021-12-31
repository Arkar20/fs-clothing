<?php

namespace App\Http\helpers;

use ErrorException;
use App\Models\ItemDetail;
use App\Http\Traits\ToastTrait;
use Gloudemans\Shoppingcart\Facades\Cart;

class AdminShoppingCart
{
    use ToastTrait;

    public function addintocart(ItemDetail $itemdetail,$qty)
    {
        Cart::setGlobalTax(0);
      try{  

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
        catch (ErrorException $e) {
            $this->confirmDialog(
                "Sorry You Don't Have Size and Color for This Item, GO TO INVENTORY?"
            );
        }
    }
}