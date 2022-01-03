<?php

namespace App\Http\helpers;

use Exception;
use ErrorException;
use App\Models\ItemDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Traits\ToastTrait;

class CheckQty{

    use ToastTrait;

    protected $expectedQty=0;
    
    public function checkQty(ItemDetail $itemdetail,$qty)
    {

            $this->expectedQty=$itemdetail->getQuantityInCart($qty);

        if($this->cartQtyIsLarger($itemdetail)){
            throw new ErrorException(" Error Invalid Quantity");
        }

    }
    public function cartQtyIsLarger($itemdetail)
    {
        return $this->expectedQty > $itemdetail->quantity;
    }
}