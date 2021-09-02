<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Registerproduct extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $retail_price;
    public $desc;
    public $brand;
    public $category;
    public $img1;
    public $img2;
    public $img3;

    protected $rules = [
        'name' => 'required|min:2|max:255|unique:items',
        'price' => 'required|numeric',
        'retail_price' => 'required|numeric',
        'desc' => 'required|min:5|max:255',
        'brand' => 'required',
        'category' => 'required',
        'img1' => 'required|mimes:jpg,png',
        'img2' => 'required|mimes:jpg,png',
        'img3' => 'required|mimes:jpg,png',
    ];

    public function store()
    {
        $this->validate();

        Item::create([
            'name' => $this->name,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'desc' => $this->desc,
            'brand_id' => Brand::where('name', $this->brand)->first()->id,
            'category_id' => Category::where(
                'category',
                $this->category
            )->first()->id,
            'user_id' => 1,
            'img1' => $this->img1->storeAs(
                'products',
                now() . $this->img1->getClientOriginalName()
            ),
            'img2' => $this->img2->storeAs(
                'products',
                now() . $this->img2->getClientOriginalName()
            ),
            'img3' => $this->img3->storeAs(
                'products',
                now() . $this->img3->getClientOriginalName()
            ),
        ]);
        session()->flash(
            'productRegistered',
            'You Have successfully registered An Item.'
        );

        return redirect()->to('/items');
    }

    public function render()
    {
        return view('livewire.item.registerproduct', [
            'items' => Item::latest()->paginate(10),
            'headers' => Item::first()->getHeaders(),
            'brands' => Brand::all(),
            'categories' => Category::all(),
        ])->layout('admin.app');
    }
}