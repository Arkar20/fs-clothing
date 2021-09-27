<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;
use App\Models\ItemDetail;
use App\Http\Traits\ToastTrait;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart extends Component
{
    use ToastTrait;

    public $cartitems;
    public $cartcount;
    public $stockqty;

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
    public function increaseCart($key)
    {
        // $this->stockqty = ItemDetail::find(Cart::get($key)->id)->quantity;

        // if ($this->stockqty < Cart::get($key)->qty + 1) {
        //     Cart::update($key, Cart::get($key)->qty);
        //     $this->loadcart();
        //     $this->emit('itemremovedfromcart');

        //     return $this->errorAlert(
        //         'Your Quantity Exceeded the Instock Quantity.'
        //     );
        // }
        $cartCount=$this->checkCart($key);

        if(!$cartCount->count()==0){
             $this->loadcart();
            return $this->errorAlert('Invalid Quantity');
        }

        Cart::update($key, Cart::get($key)->qty + 1);
        $this->loadcart();
        $this->emit('itemremovedfromcart');
    }
    public function decreaseCart($key)
    {
        Cart::update($key, Cart::get($key)->qty - 1);
        $this->loadcart();
        $this->emit('itemremovedfromcart');
    }
    public function checkCart($key)
    {
        $this->stockqty = ItemDetail::find(Cart::get($key)->id)->quantity;
        // dd($this->stockqty);
       return  Cart::search(function ($cartItem, $rowId) {
              if($this->stockqty < $cartItem->qty+1 ) {
                return $cartItem;
            }
            });
    }
    public function render()
    {
        return view('livewire.item.shopping-cart');
    }
}
