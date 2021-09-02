<?php

namespace App\Http\Livewire\Item;

use App\Models\Size;
use App\Models\Color;
use Livewire\Component;
use App\Models\ItemDetail;
use App\Http\Traits\ToastTrait;
use App\Http\Traits\CloseModelTrait;

class ItemEditTable extends Component
{
    use ToastTrait, CloseModelTrait;

    public $item;

    public $color;
    public $size;
    public $quantity;

    private $sizeid;
    private $colorid;

    public function mount($item)
    {
        $this->item = $item;
        // dd($this->item->itemdetails);
    }
    public function clearForm()
    {
        return;
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
    public function checkExists()
    {
        $this->sizeid = Size::where('size', $this->size)->first()->id;
        $this->colorid = Color::where('color', $this->color)->first()->id;
        return ItemDetail::where('size_id', $this->sizeid)
            ->where('color_id', $this->colorid)
            ->exists();
    }

    public function render()
    {
        return view('livewire.item.item-edit-table', [
            'colors' => Color::all(),
            'sizes' => Size::all(),
        ]);
    }
}
