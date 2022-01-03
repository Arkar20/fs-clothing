<?php

namespace App\Http\helpers;

use App\Models\ItemDetail;
use App\Http\helpers\ShoppingCart;
use App\Http\helpers\MyCartInterface;

class AdminCart extends ShoppingCart implements MyCartInterface
{

    public function addintocart(ItemDetail $itemdetail,$qty)
    {

         $this->add($itemdetail,-1);
       
    }
    
}