<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;
use App\Http\Traits\ToastTrait;

class ItemDelete extends Component
{
    use ToastTrait;

    protected $listeners = ['confirmed', 'cancelled'];

    public Item $item;

    public function confirmed()
    {
        $this->item->delete();

        session()->flash(
            'itemdeleted',
            'You Have successfully deleted An Item.'
        );

        return redirect()->to('/items');
    }

    public function deleteItem(Item $item)
    {
        $this->confirmDialog();
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.item.item-delete');
    }
}
