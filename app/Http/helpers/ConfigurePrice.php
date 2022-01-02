<?php

namespace App\Http\helpers;

use App\Models\ItemDetail;
use Gloudemans\Shoppingcart\Facades\Cart;

class ConfigurePrice  //! the price will change based on the customer add to cart qty 
{

     public function setPrice(ItemDetail $itemdetail,$qty)
    {
  
        // configure the price
        $newPrice=$itemdetail->configurePrice($qty);

        //then update the cart
            //find the cart key with item detail id
            $key=$itemdetail->getCartItemKey();
              
            //then update
           Cart::update($key, ['price'=>$newPrice]);

    }
}