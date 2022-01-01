<?php

namespace App\Http\helpers;

use App\Models\ItemDetail;
use App\Http\helpers\ShoppingCart;

class AdminCart extends ShoppingCart
{

    public function addintocart(ItemDetail $itemdetail,$qty)
    {

         $this->add($itemdetail,-1);
       
    }
    
}