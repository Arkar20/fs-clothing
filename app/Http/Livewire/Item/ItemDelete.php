<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;

class ItemDelete extends Component
{
    public Item $item;

    public function deleteItem(Item $item)
    {
        $item->delete();

        session()->flash(
            'itemdeleted',
            'You Have successfully deleted An Item.'
        );

        return redirect()->to('/items');
    }

    public function render()
    {
        return view('livewire.item.item-delete');
    }
}
