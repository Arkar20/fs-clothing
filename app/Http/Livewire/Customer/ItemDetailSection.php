<?php

namespace App\Http\Livewire\Customer;

use App\Http\helpers\MyCartInterface;
use ErrorException;
use App\Models\Item;
use Livewire\Component;
use App\Models\ItemDetail;
use App\Http\Traits\ToastTrait;
use Gloudemans\Shoppingcart\Facades\Cart;

class ItemDetailSection extends Component
{

    use ToastTrait;

    public $item;
    public $size;
    public $colors;
    public $color=null;
    public $availableqty;
    public $qty;
    public $itemdetail;
 

    //price (configuring retail or wholeslae price)
    public $price;

    protected $rules = ['qty' => 'required'];



     public function updated()
    {

        $this->itemdetail = $this->item
                                ->itemdetails()
                                ->filterDetail(['size'=>$this->size,'color'=>$this->color]); //* got item detial relevalt to size

        $this->availableqty = $this->itemdetail->sum('quantity');  //! configure the avaialble qty

    }
    public function updatedSize()
    {
          $this->itemdetail = $this->item
                                ->itemdetails()
                                ->filterDetail(['size'=>$this->size,'color'=>$this->color]);

        $this->availableqty = $this->itemdetail->sum('quantity');  //! configure the avaialble qty

        $this->colors=$this->itemdetail;

        
    }

    public function add(MyCartInterface $cart)
    {
        try{ 
            $this->validate();
        
            $cart->addintocart($this->itemdetail->first(),$qty=$this->qty);
     
            $this->emit('itemaddedtocart');

            $this->qty="";

            $this->successAlert("Item Added To Cart Successfully");

        } 
        
        catch(ErrorException $e){
            $this->errorAlert($e->getMessage());
        }
    }

    public function mount(Item $item)
    {
        $this->item=$item;
        $this->itemdetail=$item->itemdetails;
    }
    public function render()
    {
        return view('livewire.customer.item-detail-section');
    }
}
