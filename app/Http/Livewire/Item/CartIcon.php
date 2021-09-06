<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartIcon extends Component
{
    public $cartcount;
    protected $listeners = ['itemaddedtocart', 'itemremovedfromcart'];
    public function mount()
    {
        $this->cartcount = Cart::count();
        $this->checkOver10();
    }
    public function itemaddedtocart()
    {
        $this->cartcount = Cart::count();
        $this->checkOver10();
    }

    public function itemremovedfromcart()
    {
        $this->cartcount = Cart::count();
        $this->checkOver10();
    }
    public function checkOver10()
    {
        if ($this->cartcount > 10) {
            $this->cartcount = '10+';
        }
    }
    public function render()
    {
        return view('livewire.item.cart-icon');
    }
}
