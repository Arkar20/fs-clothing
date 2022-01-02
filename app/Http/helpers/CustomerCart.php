<?php

namespace App\Http\helpers;

use ErrorException;
use App\Models\ItemDetail;
use App\Http\Traits\ToastTrait;
use App\Http\helpers\ShoppingCart;
use App\Http\helpers\ConfigurePrice;
use Gloudemans\Shoppingcart\Facades\Cart;

class CustomerCart extends ShoppingCart
{
    use ToastTrait;

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