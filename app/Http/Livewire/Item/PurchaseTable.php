<?php

namespace App\Http\Livewire\Item;

use App\Http\Traits\TableHeadersTrait;
use Livewire\Component;
use App\Models\Purchase;

class PurchaseTable extends Component
{
    use TableHeadersTrait;

     
    public function render()
    {
        return view('livewire.item.purchase-table',['purchase_records'=>Purchase::all()]);
    }
}
