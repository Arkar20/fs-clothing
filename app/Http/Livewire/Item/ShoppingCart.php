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
        
        $this->getItemDetail($key);
    
        $cartqty=Cart::get($key)->qty;

        
        Cart::update($key,$cartqty  - 1);
        if(!Cart::content())
        { 
            return $this->errorAlert('Invalid Quantity');
           
        }
        
        $this->loadcart();
        $this->emit('itemremovedfromcart');
    }
       
    
    public function checkCart($key)
    {
       

            $this->getItemDetail($key);

               return  Cart::search(function ($cartItem, $rowId) {
              if($this->itemdetail->quantity < $cartItem->qty+1 ) {
                return $cartItem;
            }
            });
    }
    public function getItemDetail($key)
    {
            $cartid=Cart::get($key)->id;
        
            $this->itemdetail = ItemDetail::find($cartid);
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
     

    }
    public function render()
    {
        return view('livewire.item.shopping-cart');
    }
}
