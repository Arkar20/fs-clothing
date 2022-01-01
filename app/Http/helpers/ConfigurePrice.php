<?php

namespace App\Http\helpers;

use App\Models\ItemDetail;
use Gloudemans\Shoppingcart\Facades\Cart;

class ConfigurePrice {
     public $price;

    private $key,$itemdetail,$cuttentQtyInCart;

    public function __construct($key)
    {
        $cart=Cart::get($key);
        
        $this->cuttentQtyInCart=$cart->qty;


        $this->itemdetail = ItemDetail::find($cart->id);
        
    }

    public function setExpectedQty($qty)
    {
        return $expectedQty= $this->cuttentQtyInCart+$qty;   
    }
    public function setPrice($qty)
    {
        // if($this->itemdetail->qty < $this->setExpectedQty($qty)){
        //     throw new Exception("Throw Error Invalid Quantity");
        // }
        if($this->setExpectedQty($qty) >= $this->itemdetail->item->retail_qty){
                return $this->itemdetail->item->retail_price;
        }
        
        return $this->itemdetail->item->price;



    }
}