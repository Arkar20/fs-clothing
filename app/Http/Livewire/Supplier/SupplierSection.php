<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use App\Http\Traits\ToastTrait;
use App\Http\Traits\CloseModelTrait;

class SupplierSection extends Component
{
    use ToastTrait, CloseModelTrait, WithPagination;

    public $search;
    public $name;
    public $email;
    public $hotline1;
    public $hotline2;
    public $company_name;
    public $address;
    public $supplierToUpdate;

    public function store()
    {
        Supplier::create([
            'name' => $this->name,
            'email' => $this->email,
            'hotline1' => $this->hotline1,
            'hotline2' => $this->hotline2,
            'company_name' => $this->company_name,
            'address' => $this->address,
        ]);

        $this->closeModal();
        $this->successAlert('Supplier Register Successful');
        $this->clearForm();
    }
    public function edit(Supplier $supplier)
    {
        $this->supplierToUpdate = $supplier;
        $this->name = $supplier->name;
        $this->email = $supplier->email;
        $this->company_name = $supplier->company_name;
        $this->hotline1 = $supplier->hotline1;
        $this->hotline2 = $supplier->hotline2;
        $this->address = $supplier->address;
    }
    public function update()
    {
        $this->supplierToUpdate->update([
            'name' => $this->name,
            'email' => $this->email,
            'hotline1' => $this->hotline1,
            'hotline2' => $this->hotline2,
            'company_name' => $this->company_name,
            'address' => $this->address,
        ]);
        $this->closeModal();
        $this->successAlert('Supplier Register Successful');
        $this->clearForm();
    }
    public function delete(Supplier $supplier)
    {
        $supplier->delete();
        $this->errorAlert('Supplier Delete Successful');
    }

    public function clearForm()
    {
        $this->name = '';
        $this->email = '';
        $this->hotline1 = '';
        $this->hotline2 = '';
        $this->company_name = '';
        $this->address = '';
    }

    public function render()
    {
        return view('livewire.supplier.supplier-section', [
            'suppliers' => Supplier::FilterSearch('name', $this->search)
                ->FilterSearch('email', $this->search)
                ->FilterSearch('company_name', $this->search)
                ->FilterSearch('hotline1', $this->search)
                ->FilterSearch('hotline2', $this->search)
                ->FilterSearch('address', $this->search)
                ->latest()
                ->paginate(10),

            'headers' => Supplier::first()->getHeaders(),
        ])->layout('admin.app');
    }
}
