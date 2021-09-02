<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;
use App\Http\Traits\CloseModelTrait;
use App\Http\Traits\ToastTrait;

class ItemEdit extends Component
{
    use CloseModelTrait, ToastTrait;

    public $item;
    public $brand;
    public $category;
    public $desc;
    public $price;
    public $retail_price;

    public function store()
    {
        return;
    }

    public function mount(Item $item)
    {
        $this->item = $item;
        $this->brand = $item->brand->name;
        $this->category = $item->category->category;
        $this->price = $item->price;
        $this->retail_price = $item->retail_price;
        $this->desc = $item->desc;
    }
    public function updateBrand()
    {
        $this->item->update([
            'brand_id' => Brand::where('name', $this->brand)->first()->id,
        ]);
        $this->item->refresh();
        $this->closeModal();
        $this->successAlert('Brand Edited Successfully!');
    }
    public function updateCategory()
    {
        $this->item->update([
            'category_id' => Category::where(
                'category',
                $this->category
            )->first()->id,
        ]);
        $this->item->refresh();
        $this->closeModal();
        $this->successAlert('Category Edited Successfully!');
    }
    public function updateDescription()
    {
        $this->item->update([
            'desc' => $this->desc,
        ]);
        $this->item->refresh();
        $this->closeModal();
        $this->successAlert('Desctiption Edited Successfully!');
    }
    public function updatePrice()
    {
        $this->item->update([
            'price' => $this->price,
        ]);
        $this->item->refresh();
        $this->closeModal();
        $this->successAlert('Price Edited Successfully!');
    }
    public function updateRetailPrice()
    {
        $this->item->update([
            'retail_price' => $this->retail_price,
        ]);
        $this->item->refresh();
        $this->closeModal();
        $this->successAlert('Retail Price Edited Successfully!');
    }
    public function render()
    {
        return view('livewire.item.item-edit', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }
}