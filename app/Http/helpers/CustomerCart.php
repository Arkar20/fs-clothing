<?php

namespace App\Http\helpers;

use ErrorException;
use App\Models\ItemDetail;
use App\Http\helpers\ShoppingCart;
use App\Http\helpers\ConfigurePrice;
use App\Http\helpers\MyCartInterface;

class CustomerCart extends ShoppingCart implements MyCartInterface
{

    private $checkQty;

    public function __construct()
    {
        $this->checkQty=new CheckQty();
        $this->configPrice= new ConfigurePrice();
        
    }

    public function addintocart(ItemDetail $itemdetail,$qty)
    {

         $this->checkQty->checkQty($itemdetail,$qty);

         $this->add($itemdetail,$qty);

         $this->configPrice->setPrice($itemdetail,$qty);
       
    }
    
}