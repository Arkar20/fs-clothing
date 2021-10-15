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

    public $rules=['address'=>'required'];

    public $payment;
    public function orderConfirm()
    {
           if(!auth()->guard('customer')->check()){

             return $this->errorAlert('Please Login First!');
        } // return redirect()->route('customer.payment');

          if (!$this->totalCart() == 0) {

                  $order=$this->saveOrderRecords();

                return redirect()->route('customer.payment',$order);
        }         
        
        return $this->errorAlert('No Items In the Cart, Cannot Order!');

    }
      public function saveOrderRecords()
    {
        

        $this->validate();

        $order=Order::create([
            'customer_id' => auth()->id()?:1,
            'total_amount' => (int) Cart::total(0, false, false),
        ]);

        $order->delivery()->create(['address'=>$this->address,'note'=>$this->note]);

        session()->flash('purchased', 'Purchase Completed');

        return $order;
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
