<?php

namespace App\Http\Livewire\Deliver;

use Livewire\Component;
use App\Models\Delivery;
use Livewire\WithPagination;
use App\Http\Traits\ToastTrait;
use App\Http\Traits\CloseModelTrait;

class DeliverySection extends Component
{
    use WithPagination, ToastTrait, CloseModelTrait;

    public $search;
    public $township;
    public $zipcode;
    public $price;
    public $deliveryToUpdate;

    public function store()
    {
        Delivery::create([
            'township' => $this->township,
            'zipcode' => $this->zipcode,
            'price' => $this->price,
        ]);

        $this->closeModal();
        $this->successAlert('Delivery Record Register Successful');
        $this->clearForm();
    }

    public function edit(Delivery $delivery)
    {
        $this->deliveryToUpdate = $delivery;
        $this->township = $delivery->township;
        $this->zipcode = $delivery->zipcode;
        $this->price = $delivery->price;
    }
    public function update()
    {
        $this->deliveryToUpdate->update([
            'township' => $this->township,
            'zipcode' => $this->zipcode,
            'price' => $this->price,
        ]);

        $this->closeModal();
        $this->successAlert('Delivery Record Update Successful');
        $this->clearForm();
    }
    public function delete(Delivery $delivery)
    {
        $delivery->delete();
        $this->errorAlert('Delivery Record Delete Successful');
    }
    public function clearForm()
    {
        $this->township = '';
        $this->zipcode = '';
        $this->price = '';
    }

    public function render()
    {
        return view('livewire.deliver.delivery-section', [
            'deliveries' => Delivery::FilterSearch('township', $this->search)
                ->FilterSearch('price', $this->search)
                ->FilterSearch('zipcode', $this->search)
                ->latest()
                ->paginate(10),
            'headers' => Delivery::first()->getHeaders(),
        ])->layout('admin.app');
    }
}
