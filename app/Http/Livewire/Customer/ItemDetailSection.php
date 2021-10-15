<?php

namespace App\Http\Livewire\Customer;

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


    public $color;
    public $availableqty;
    public $qty;
    public $itemdetail;
    public $selectitem;
    public $addtocartitemid;

    //price (configuring retail or wholeslae price)
    public $price;

    protected $rules = ['qty' => 'required'];


    public function updatedSize()
    {
        $this->addtocartitemid = null;
        $itemdetail = ItemDetail::where('item_id', $this->item->id)->where(
            'size_id',
            $this->size
        );
        $this->colors = $itemdetail->get();
        $this->color = $itemdetail->get()->first()->color_id;
        $this->availableqty = $itemdetail->sum('quantity');
    }
    public function updatedColor()
    {
        $this->selectitem = ItemDetail::where('item_id', $this->item->id)
            ->where('size_id', $this->size)
            ->where('color_id', $this->color)
            ->get()
            ->first();
        $this->availableqty =
        $this->selectitem->quantity ?: $this->selectitem->item->total_qty;
        $this->addtocartitemid = $this->selectitem->id;
    }

    public function add()
    {
        $this->itemdetail = $this->getDetailItem();
        // dd($this->itemdetail);
  
         $cartItem=$this->checkCart();
        //  dd($cartItem->count());
            if(!$cartItem->count()==0){
               return $this->errorAlert('Invalid Quantity');
            }
             try {
       
            $this->addintocart();
        } catch (ErrorException $e) {
            $this->errorAlert(
                "The Quantity is Invalid"
            );
        }
        
    }
    public function checkCart()
    {
        $this->validate();
        $this->checkRetailPrice();
       return    Cart::search(function ($cartItem, $rowId) {
               if($cartItem->id==$this->itemdetail->id ){
                if($this->itemdetail->quantity<$cartItem->qty+$this->qty){
                    return $cartItem;   
                }
               }
            });
    }

   
     public function addintocart()
    {
        // dd($this->itemdetail);
             Cart::setGlobalTax(10);

            Cart::add([
                'id' => $this->itemdetail->id,
                'name' => $this->itemdetail->getItemName(),
                'qty' => $this->qty,
                'price' => $this->price,
                'weight' => 0,
                'options' => [
                    'size' => $this->itemdetail->getItemSize(),
                    'color' => $this->itemdetail->getItemColor(),
                ],
            ]);
            $this->emit('itemaddedtocart');

            $this->successAlert("Item Added To Cart.");


    }
    public function checkRetailPrice()
    {
        if($this->qty >= $this->item->retail_qty){
            $this->price=$this->item->retail_price;
        }
        else{
            $this->price=$this->item->price;

        }
    }
      public function getDetailItem()
    {
        return ItemDetail::where('item_id', $this->item->id)
            ->where('size_id', $this->size)
            ->where('color_id', $this->color)
            ->get()
            ->first();
    }
    public function mount(Item $item)
    {
        $this->item=$item;
    }
    public function render()
    {
        return view('livewire.customer.item-detail-section');
    }
}
