<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderDetailCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $totalAmount;
    public $tax;
    public $subTotal;
    public function __construct($totalAmount,$tax,$subtotal)
    {

        $this->totalAmount =$totalAmount;
        $this->tax=$tax;
        $this->subTotal=$subtotal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.order-detail-card');
    }
}
