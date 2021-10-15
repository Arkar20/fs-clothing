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
        $this->checkRetailPrice($key);

        $this->loadcart();
        $this->emit('itemremovedfromcart');
    }
    public function decreaseCart($key)
    {
        $cartCount=$this->checkCart($key);
            if(!$cartCount->count()==0){
                        $this->loadcart();
                        return $this->errorAlert('Invalid Quantity');
                    }
        Cart::update($key, Cart::get($key)->qty - 1);
        $this->checkRetailPrice($key);

        $this->loadcart();
        $this->emit('itemremovedfromcart');
    }
    public function checkCart($key)
    {
        if(!$key) $this->errorAlert("Cart has no Items");


        $this->itemdetail = ItemDetail::find(Cart::get($key)->id);
        // dd($this->stockqty);
       return  Cart::search(function ($cartItem, $rowId) {
              if($this->itemdetail->quantity < $cartItem->qty+1 ) {
                return $cartItem;
            }
            });
    }
     public function checkRetailPrice($key)
    {

        $cartitem=Cart::get($key);

        if($this->itemdetail->item->retail_qty < $cartitem->qty ){
        
           Cart::update($key, ['price'=>$this->itemdetail->item->retail_price]);
        }
        else if($this->itemdetail->item->retail_qty >= $cartitem->qty){
          

           Cart::update($key, ['price'=>$this->itemdetail->item->price]);

        }
        // $this->loadcart();

    }
    public function render()
    {
        return view('livewire.item.shopping-cart');
    }
}
