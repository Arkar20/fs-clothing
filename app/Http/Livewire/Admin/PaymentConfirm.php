<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use App\Http\Traits\ToastTrait;

class PaymentConfirm extends Component
{
    use ToastTrait;

    protected $listeners=['confirmedpayment', 'cancelled'];
    public $order;

    public function mount(Order $order)
    {
        $this->order=$order;
    }
   
    public function confirmPayment()
    {
        return $this->confirm("Are you sure you want to proceed?", [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'confirmedpayment',
            'onCancelled' => 'cancelled',
        ]);

    }
    public function confirmedpayment()
    {
        $this->order->update(['payment_status' => !$this->order->payment_status]);
    }
    public function render()
    {
        return view('livewire.admin.payment-confirm');
    }
}
