<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;

class ItemEdit extends Component
{
    public $item;

    public function mount(Item $item)
    {
        $this->item = $item;
    }
    public function render()
    {
        return view('livewire.item.item-edit');
    }
}
