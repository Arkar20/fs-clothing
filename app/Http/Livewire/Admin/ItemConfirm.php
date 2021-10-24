<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use App\Http\Traits\ToastTrait;

class ItemConfirm extends Component
{
    use ToastTrait;

    protected $listeners=['confirmed', 'cancelled'.'confirmedpayment'];
    public $order;

    public function mount(Order $order)
    {
        $this->order=$order;
    }
    public function confirmOrder()
    {
        $this->confirmDialog("Are You Sure You want to Confirm This Order?");

    }
    public function confirmed()
    {
        
      $this->order->update(['order_status' => !$this->order->order_status]);
    }
    
    

    public function render()
    {
        return view('livewire.admin.item-confirm');
    }
}
