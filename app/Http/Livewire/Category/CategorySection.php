<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Http\Traits\ToastTrait;
use Illuminate\Validation\Rule;
use App\Http\Traits\CloseModelTrait;
use App\Http\Traits\TableHeadersTrait;

class CategorySection extends Component
{
    use ToastTrait, WithPagination, CloseModelTrait, TableHeadersTrait;
    protected $listeners = ['confirmed', 'cancelled'];

    public $category;
    public $search;

    //update
    public $categoryToUpdate;

    public $categoryToDelete;

    protected $rules = [
        'category' => 'required|min:4|unique:categories',
    ];

    public function store()
    {
        $this->validate();

        Category::create(['category' => $this->category]);
        $this->clearForm();
        $this->closeModal();

        $this->successAlert('Category Created');
    }
    public function delete(Category $category)
    {
        $this->confirmDialog();
        $this->categoryToDelete = $category;
    }
    public function edit(Category $category)
    {
        $this->resetErrorBag();

        $this->categoryToUpdate = $category;
        $this->category = $category->category;
    }
    public function confirmed()
    {
        $this->categoryToDelete->delete();

        $this->successAlert('Category Has Deleted Permently');
    }

    public function update()
    {
        $this->validate();

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
            'headers' => $this->getHeaders('categories'),
        ])->layout('admin.app');
    }
}
