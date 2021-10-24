<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;
use App\Models\Purchase;
use Livewire\WithPagination;
use App\Http\Traits\TableHeadersTrait;

class PurchaseTable extends Component
{
    use TableHeadersTrait,WithPagination;

    // search by keywords 
    public $search;

    public $status;
      //filter by start data and end date 
    public $searchStartDate;
    public $searchEndDate;
     
    
    public function render()
    {
        return view('livewire.item.purchase-table',
                    ['purchase_records'=>Purchase::
                                                    FilterBySupplierInfo($this->search)
                                                  ->FilterByStartEndDate($this->searchStartDate,$this->searchEndDate)
                                                  ->when($this->status && $this->status=="Top Supplier",function($query){
                                                      return $query->orderBy('total_amount','desc');
                                                  })
                                                  ->latest()
                                                 ->paginate(10)]);
    }
}
