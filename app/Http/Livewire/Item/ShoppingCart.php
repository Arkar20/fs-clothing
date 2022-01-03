<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;
use App\Models\ItemDetail;
use App\Http\Traits\ToastTrait;
use App\Http\helpers\CustomerCart;
use App\Http\helpers\MyCartInterface;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart extends Component
{
    use ToastTrait;

    public $cartitems;
    public $cartcount;
    public $stockqty;

    //checking cart item quantity


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
        $this->emit('itemremovedfromcart');
    }
    public function removefromcart($key)
    {
        Cart::remove($key);
        $this->loadcart();
        $this->emit('itemremovedfromcart');
    }
    public function increaseCart(ItemDetail $itemdetail,MyCartInterface $cart)
    {

        $cart->addintocart($itemdetail,$qty=1);
        
        $this->loadcart();
       
      
    }
    public function decreaseCart(ItemDetail $itemdetail,MyCartInterface $cart)
    {
         $cart->addintocart($itemdetail,$qty=-1);
        
        $this->loadcart();
      
    }
       
    
    public function render()
    {
        return view('livewire.item.shopping-cart');
    }
}
