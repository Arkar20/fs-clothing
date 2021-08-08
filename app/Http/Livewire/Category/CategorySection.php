<?php

namespace App\Http\Livewire\Category;

use App\Http\Traits\CloseModelTrait;
use App\Http\Traits\ToastTrait;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategorySection extends Component
{
    use ToastTrait, WithPagination, CloseModelTrait;

    public $category;
    public $search;

    //update
    public $categoryToUpdate;

    public function store()
    {
        Category::create(['category' => $this->category]);
        $this->clearForm();
        $this->closeModal();

        $this->successAlert('Category Created');
    }
    public function delete(Category $category)
    {
        $category->delete();
        $this->successAlert('Category Deleted');
    }
    public function edit(Category $category)
    {
        $this->categoryToUpdate = $category;
        $this->category = $category->category;
    }
    public function update()
    {
        $this->categoryToUpdate->update(['category' => $this->category]);
        $this->successAlert('Category Updated');
        $this->closeModal();
    }
    public function clearForm()
    {
        $this->category = '';
    }

    public function render()
    {
        return view('livewire.category.category-section', [
            'categories' => Category::FilterSearch('category', $this->search)
                ->latest()
                ->paginate(10),
            'headers' => Category::first()->getHeaders(),
        ])->layout('admin.app');
    }
}
