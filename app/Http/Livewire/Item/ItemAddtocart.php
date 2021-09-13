<?php

namespace App\Http\Livewire\Item;

use ErrorException;
use App\Models\Item;
use App\Models\Color;
use Livewire\Component;
use App\Models\ItemDetail;
use App\Http\Traits\ToastTrait;
use Gloudemans\Shoppingcart\Facades\Cart;

class ItemAddtocart extends Component
{
    use ToastTrait;

    protected $listeners = ['itemtoaddtocart', 'confirmedForAddtoCart', 'cancelled'];
    protected $rules = ['qty' => 'required'];

    public $item;
    public $size;
    public $color;
    public $addtocartitemid;
    public $itemdetail;
    public $availableqty;
    public $sizes;

    public $colors;
    public $selectitem;

    public $qty;

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

    public function itemtoaddtocart(Item $item)
    {
        $this->item = $item;
        // $this->sizes = $item
        //     ->itemdetails()
        //     ->pluck('id', 'size_id')
        //     ->map(function ($value) {
        //         return ItemDetail::find($value);
        //     });
    }
    public function add()
    {
        $this->validate();
        try {
            Cart::setGlobalTax(0);
            $this->itemdetail = $this->getDetailItem();
            // dd($this->itemdetail);
            $this->addintocart();
            $this->emit('itemaddedtocart');
        } catch (ErrorException $e) {
            $this->confirmDialog(
                "Sorry You Don't Have Size and Color for This Item, GO TO INVENTORY?"
            );
        }
    }
    public function confirmedForAddtoCart()
    {
        return redirect()->route('items.edit', $this->item->name);
    }
    public function getDetailItem()
    {
        return ItemDetail::where('item_id', $this->item->id)
            ->where('size_id', $this->size)
            ->where('color_id', $this->color)
            ->get()
            ->first();
    }
    public function addintocart()
    {
        Cart::add([
            'id' => $this->itemdetail->id,
            'name' => $this->itemdetail->getItemName(),
            'qty' => $this->qty,
            'price' => $this->item->price,
            'weight' => 0,
            'options' => [
                'size' => $this->itemdetail->getItemSize(),
                'color' => $this->itemdetail->getItemColor(),
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.item.item-addtocart');
    }
}
