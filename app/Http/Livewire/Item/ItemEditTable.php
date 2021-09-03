<?php

namespace App\Http\Livewire\Item;

use App\Models\Size;
use App\Models\Color;
use Livewire\Component;
use App\Models\ItemDetail;
use App\Http\Traits\ToastTrait;
use App\Http\Traits\CloseModelTrait;
use App\Http\Traits\TableHeadersTrait;

class ItemEditTable extends Component
{
    use ToastTrait, CloseModelTrait, TableHeadersTrait;

    protected $listeners = ['confirmeddetail', 'cancelled'];

    protected $rules = ['size' => 'required', 'color' => 'required'];

    public $item;

    public $color;
    public $size;
    public $quantity;

    public $sizeid;
    public $colorid;
    public $itemToDelete;
    public $itemToUpdate;

    public function mount($item)
    {
        $this->item = $item;
        // dd($this->item->itemdetails);
    }
    public function clearForm()
    {
        $this->size = '';
        $this->color = '';
    }
    public function store()
    {
        $detailexists = $this->checkExists();

        if (!$detailexists) {
            $this->item->itemdetails()->create([
                'color_id' => $this->colorid,
                'size_id' => $this->sizeid,
                'quantity' => $this->quantity,
            ]);
            $this->closeModal();
            $this->clearForm();
            $this->successAlert('New Color and Size Registered Successful!');
            return $this->item->fresh();
        }

        $this->errorAlert('Record Exists');
    }
    public function editItemDetail(ItemDetail $itemdetail)
    {
        $this->resetErrorBag();
        $this->itemToUpdate = $itemdetail;
        $this->size = $itemdetail->size->size;
        $this->color = $itemdetail->color->color;
        $this->quantity = $itemdetail->quantity;
    }
    public function update()
    {
        $this->sizeid = Size::where('size', $this->size)->first()->id;
        $this->colorid = Color::where('color', $this->color)->first()->id;

        $this->itemToUpdate->updateOrCreate(
            [
                'item_id' => $this->item->id,
                'color_id' => $this->colorid,
                'size_id' => $this->sizeid,
            ],
            [
                'quantity' => $this->quantity,
            ]
        );
        $this->item->total_qty = $this->item->itemdetails()->sum('quantity');

        $this->emit('itemedited');

        $this->closeModal();

        $this->successAlert('ItemDetail Updated Successful!');
    }
    public function checkExists()
    {
        $this->sizeid = Size::where('size', $this->size)->first()->id;
        $this->colorid = Color::where('color', $this->color)->first()->id;
        return ItemDetail::where('size_id', $this->sizeid)
            ->where('color_id', $this->colorid)
            ->where('item_id', $this->item->id)
            ->exists();
    }
    public function deleteItemDetail(ItemDetail $itemdetail)
    {
        $this->confirmDialogForItemdetail();
        $this->itemToDelete = $itemdetail;
    }

    public function confirmeddetail()
    {
        $this->itemToDelete->delete();
        $this->emit('itemedited');
        $this->successAlert('Item Detail Deleted');
    }

    public function render()
    {
        return view('livewire.item.item-edit-table', [
            'colors' => Color::all(),
            'sizes' => Size::all(),
            'headers' => $this->getHeaders('item_details'),
        ]);
    }
}
