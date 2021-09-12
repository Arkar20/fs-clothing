<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SupplierInformationForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $supplierprofile;
    public function __construct($supplierprofile)
    {
        $this->supplierprofile = $supplierprofile;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.supplier-information-form');
    }
}
