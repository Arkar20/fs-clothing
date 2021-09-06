<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart extends Component
{
    public $cartitems;
    public $cartcount;

    protected $listeners = ['itemaddedtocart' => 'loadcart'];

    public function loadcart()
    {
        $this->cartitems = Cart::content();
        $this->cartcount = Cart::count();
    }

    public function mount()
    {
        $this->loadcart();
    }
    public function clearcart()
    {
        Cart::destroy();
        $this->loadcart();
    }
    public function removefromcart($key)
    {
        Cart::remove($key);
        $this->loadcart();
        $this->emit('itemremovedfromcart');
    }
    public function render()
    {
        return view('livewire.item.shopping-cart');
    }
}
