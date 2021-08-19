<?php

namespace App\Http\Livewire\Brands;

use App\Http\Traits\CloseModelTrait;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\ToastTrait;

class BrandSection extends Component
{
    use WithPagination, ToastTrait, CloseModelTrait;
    protected $listeners = ['confirmed', 'cancelled'];

    public $name;
    public $company;
    public $desc;
    //brand to update
    public $brandToUpdate;
    //search
    public $search;
    //brand to delete
    public $brandToDelete;

    public function store()
    {
        $brand = Brand::create([
            'name' => $this->name,
            'company' => $this->company,
            'desc' => $this->desc,
        ]);
        $this->closeModal();
        Brand::find($brand->id);
        $this->clearForm();
        $this->successAlert('Brand Register Successful!');
    }
    public function edit(Brand $brand)
    {
        $this->brandToUpdate = $brand;
        $this->name = $brand->name;
        $this->company = $brand->company;
        $this->desc = $brand->desc;
    }
    public function update()
    {
        $this->brandToUpdate->update([
            'name' => $this->name,
            'desc' => $this->desc,
            'company' => $this->company,
        ]);

        $this->closeModal();

        $this->successAlert('Brand Updated Successful!');
    }
    public function delete(Brand $brand)
    {
        $this->confirmDialog();
        $this->brandToDelete = $brand;
    }

    public function confirmed()
    {
        $this->brandToDelete->delete();

        $this->alert('success', 'A Brand Has Been Permently Deleted!');
    }
    public function cancelled()
    {
    }
    public function clearForm()
    {
        $this->name = '';
        $this->company = '';
        $this->desc = '';
    }
    public function render()
    {
        return view('livewire.brands.brand', [
            'brands' => Brand::FilterSearch('name', $this->search)
                ->FilterSearch('company', $this->search)
                ->FilterSearch('desc', $this->search)
                ->orderBy('updated_at', 'desc')
                ->paginate(10),
            'headers' => Brand::first()->getHeaders(),
        ])->layout('admin.app');
    }
}
