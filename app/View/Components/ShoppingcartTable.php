<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShoppingcartTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $cartitems;
    public $cartcount;
    public function __construct($data,$cartcount)
    {
        $this->cartitems = $data;
        $this->cartcount = $cartcount;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shoppingcart-table');
    }
}
