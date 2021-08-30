<?php

namespace App\Http\Livewire\Product;

use App\Models\Item;
use Livewire\Component;

class Registerproduct extends Component
{
    public function render()
    {
        return view('livewire.product.registerproduct', [
            'items' => Item::latest()->paginate(10),
            'headers' => Item::first()->getHeaders(),
        ])->layout('admin.app');
    }
}
