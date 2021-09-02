<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Http\Traits\FilterFieldTrait;

class Items extends Component
{
    use WithPagination, FilterFieldTrait;
    public $brand;
    public $category;
    public $search;

    public $queryString = ['brand', 'category'];

    public function updated()
    {
        if ($this->brand == '') {
            $this->brand = null;
        } elseif ($this->category == '') {
            $this->category = null;
        }
        $this->resetPage();
    }

    public function selectToDisplay(Item $item)
    {
        $this->emit('singleItemHasSelected', $item);
    }

    public function render()
    {
        $brands = Brand::all()->pluck('id', 'name');
        $categories = Category::all()->pluck('id', 'category');

        return view('livewire.item.items', [
            'items' => Item::when($this->brand, function ($item) use ($brands) {
                return $item->where('brand_id', $brands->get($this->brand));
            })
                ->when($this->category, function ($item) use ($categories) {
                    return $item->where(
                        'category_id',
                        $categories->get($this->category)
                    );
                })
                ->when($this->search, function ($item) {
                    return $item->where(
                        'name',
                        'LIKE',
                        '%' . $this->search . '%'
                    );
                })

                ->latest()
                ->paginate(16),
            'brands' => Brand::all(),
            'categories' => Category::all(),
        ]);
    }
}
