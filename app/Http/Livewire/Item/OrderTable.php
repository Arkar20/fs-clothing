<?php

namespace App\Http\Livewire\Item;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\TableHeadersTrait;

class OrderTable extends Component
{
    use TableHeadersTrait,WithPagination;

    // search by keywords 
    public $search;

    //* status filtering
    public $status;
      //filter by start data and end date 
    public $searchStartDate;
    public $searchEndDate;
     
    public $queryString=['search','status','searchStartDate','searchEndDate'];

    // public function updatedStatus()
    // {
    //     if($this->status=="All" || $this->status=="")
    //     {
    //         $this->status = null;
    //     }
    // }

    public function render()
    {
        return view('livewire.item.order-table',
                    ['order_records'=>Order::
                                            when(auth()->guard('customer')->check(),function($query){
                                                return $query->where('customer_id',auth()->guard('customer')->id());
                                            })
                                            ->when($this->search,function($query){
                                                return  $query->whereRelation('customer','name','LIKE','%'.$this->search.'%')
                                            ->orWhereRelation('customer','email','LIKE','%'.$this->search.'%')
                                            ->orWhereRelation('customer','phnum1','LIKE','%'.$this->search.'%');
                                            })
                                          
                                          ->FilterByStartEndDate($this->searchStartDate,$this->searchEndDate)
                                          ->FilterByStatus($this->status)

                                                  ->latest()
                                            ->paginate(10)]);
    }
}
