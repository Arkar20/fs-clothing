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


      //filter by start data and end date 
    public $searchStartDate;
    public $searchEndDate;
     
    public function render()
    {
        return view('livewire.item.purchase-table',
                    ['purchase_records'=>Purchase::
                                            when($this->search,function($query){
                                                return  $query->whereRelation('supplier','name','LIKE','%'.$this->search.'%')
                                            ->orWhereRelation('supplier','email','LIKE','%'.$this->search.'%')
                                            ->orWhereRelation('supplier','company_name','LIKE','%'.$this->search.'%')
                                            ->orWhereRelation('supplier','hotline1','LIKE','%'.$this->search.'%');
                                            })
                                          
                                            ->when($this->searchStartDate && $this->searchEndDate, function ($query){
                                                    return  $query->whereDate('created_at','>=',$this->searchStartDate)
                                                                 ->whereDate('created_at','<=', $this->searchEndDate);
                                                })
                                                  ->latest()
                                            ->paginate(10)]);
    }
}
