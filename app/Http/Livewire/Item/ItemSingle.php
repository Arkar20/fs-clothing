<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;

class ItemSingle extends Component
{
    protected $listeners = ['singleItemHasSelected'];

    public $item;

    public function singleItemHasSelected(Item $item)
    {
        $this->item = $item;
    }
    public function selectProductCart(Item $item)
    {
        $this->emit('itemtoaddtocart', $item);
    }

    public function render()
    {
        return view('livewire.item.item-single');
    }
}
