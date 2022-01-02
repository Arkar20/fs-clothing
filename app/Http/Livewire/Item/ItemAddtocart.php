<?php

namespace App\Http\Livewire\Item;

use ErrorException;
use App\Models\Item;
use App\Models\Color;
use Livewire\Component;
use App\Models\ItemDetail;
use App\Http\helpers\AdminCart;
use App\Http\Traits\ToastTrait;
use Illuminate\Support\Facades\DB;
use App\Http\helpers\AdminShoppingCart;
use App\Http\helpers\CustomerCart;
use Gloudemans\Shoppingcart\Facades\Cart;

class ItemAddtocart extends Component
{
    use ToastTrait;

    protected $listeners = ['itemtoaddtocart', 'confirmedForAddtoCart', 'cancelled'];


    protected $rules = ['qty' => 'required'];

    public $item,$size,$color,$itemdetail,$availableqty,$qty;
    
    public function itemtoaddtocart(Item $item)  //* get from the parent ( listeners events )
    {
        $this->item=$item;
        $this->itemdetail = $item->itemdetails;
        
    }

    public function updated()
    {

        $this->itemdetail = $this->item
                                ->itemdetails()
                                ->filterDetail(['size'=>$this->size,'color'=>false]); //* got item detial relevalt to size

        $this->availableqty = $this->itemdetail->sum('quantity');  //! configure the avaialble qty
    }


    
    public function add(CustomerCart $cart)
    {
            $this->validate();
        
            $cart->addintocart($this->itemdetail->first(),$qty=$this->qty);
     
            $this->emit('itemaddedtocart');

    }
    public function confirmedForAddtoCart() //! when the user click ok in dialog redirect 
    {
        return redirect()->route('items.edit', $this->item->name);
    }

    public function render()
    {
        return view('livewire.item.item-addtocart');
    }
}
