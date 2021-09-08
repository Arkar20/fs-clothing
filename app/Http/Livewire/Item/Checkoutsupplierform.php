<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Http\Traits\ToastTrait;
use Gloudemans\Shoppingcart\Facades\Cart;

class Checkoutsupplierform extends Component
{
    use ToastTrait;
    public $supplier;
    public $supplierprofile;
    public function updatedSupplier()
    {
        $this->supplierprofile = Supplier::find($this->supplier);
        // dd($this->supplierprofile);
    }
    public function purchase()
    {
        // dd(Cart::count());
        if ($this->totalCart() == 0) {
            return $this->errorAlert('No Items In the Cart');
        } else {
            $this->savePurchaseRecord();
            return redirect()->route('item.showroom');
        }
    }

    public function savePurchaseRecord()
    {
        Purchase::create([
            'supplier_id' => $this->supplierprofile->id,
            'total_amount' => (int) Cart::total(0, false, false),
        ]);
        session()->flash('purchased', 'Purchase Completed');
    }
    public function totalCart()
    {
        return Cart::count();
    }

    public function render()
    {
        return view('livewire.item.checkoutsupplierform');
    }
}
