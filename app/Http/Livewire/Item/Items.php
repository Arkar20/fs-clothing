<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class Items extends Component
{
    use WithPagination;

    public function selectToDisplay(Item $item)
    {
        $this->emit('singleItemHasSelected', $item);
    }

    public function render()
    {
        return view('livewire.item.items', [
            'items' => Item::latest()->paginate(16),
        ]);
    }
}
