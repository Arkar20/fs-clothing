<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use App\Models\Color;
use Livewire\Component;
use App\Models\ItemDetail;
use Gloudemans\Shoppingcart\Facades\Cart;

class ItemAddtocart extends Component
{
    protected $listeners = ['itemtoaddtocart'];
    public $item;
    public $size;
    public $color;
    public $addtocartitemid;
    public $itemdetail;
    public $availableqty;
    public $sizes;

    public $colors;
    public $selectitem;
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
        Cart::setGlobalTax(0);
        $this->itemdetail = ItemDetail::where('item_id', $this->item->id)
            ->where('size_id', $this->size)
            ->where('color_id', $this->color)
            ->get()
            ->first();
        // dd($this->itemdetail);
        Cart::add([
            'id' => $this->itemdetail->id,
            'name' => $this->itemdetail->getItemName(),
            'qty' => 10,
            'price' => $this->item->price,
            'weight' => 0,
            'options' => [
                'size' => $this->itemdetail->getItemSize(),
                'color' => $this->itemdetail->getItemColor(),
            ],
        ]);
        $this->emit('itemaddedtocart');
        // dd(Cart::content());
    }

    public function render()
    {
        return view('livewire.item.item-addtocart');
    }
}
