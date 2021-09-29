<?php

namespace App\Http\Livewire\Customer;

use App\Models\Order;
use Livewire\Component;
use App\Models\Delivery;
use App\Http\Traits\ToastTrait;
use Gloudemans\Shoppingcart\Facades\Cart;

class DeliverCheckoutForm extends Component
{

    use ToastTrait;

    public $address,$note,$card;

    public function orderConfirm()
    {
          if (!$this->totalCart() == 0) {
             $this->saveOrderRecords();
            return redirect()->route('home.shop');
        }         
        
        return $this->errorAlert('No Items In the Cart, Cannot Order!');

    }
      public function saveOrderRecords()
    {
        $order=Order::create([
            'customer_id' => auth()->id()?:1,
            'total_amount' => (int) Cart::total(0, false, false),
        ]);

        $order->delivery()->create(['address'=>$this->address,'note'=>$this->note]);

        session()->flash('purchased', 'Purchase Completed');
    }
      public function totalCart()
    {
        return Cart::count();
    }
    
    public function render()
    {
        return view('livewire.customer.deliver-checkout-form');
    }
}
