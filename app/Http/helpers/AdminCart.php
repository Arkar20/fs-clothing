<?php

namespace App\Http\helpers;

use App\Models\ItemDetail;
use App\Http\helpers\ShoppingCart;
use App\Http\helpers\MyCartInterface;

class AdminCart extends ShoppingCart implements MyCartInterface
{
    // protected $price; 

    // public function __construct($price)
    // {
    //     $this->price=$price;
    // }

    public function addintocart(ItemDetail $itemdetail,$qty)
    {

         $this->add($itemdetail,$qty);
       
    }
    
}