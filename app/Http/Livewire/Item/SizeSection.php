<?php

namespace App\Http\Livewire\Item;

use App\Models\Size;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\ToastTrait;
use App\Http\Traits\CloseModelTrait;
use App\Http\Traits\TableHeadersTrait;

class SizeSection extends Component
{
    use WithPagination, ToastTrait, CloseModelTrait, TableHeadersTrait;

    public $size;
    public $waist;
    public $hip;
    public $inside_leg;
    public $weight;

    public $search;
    public $sizeToUpdate;
    public $sizeToDelete;

    protected $rules = [
        'size' => 'required',
        'waist' => 'required',
        'hip' => 'required',
        'inside_leg' => 'required',
        'weight' => 'required|numeric',
    ];

    public function store()
    {
        $this->validate();

        $size = Size::create([
            'size' => $this->size,
            'waist' => $this->waist,
            'hip' => $this->hip,
            'inside_leg' => $this->inside_leg,
            'weight' => $this->weight,
        ]);
        $this->closeModal();
        $this->clearForm();
        $this->successAlert('Size Register Successful!');
    }

    public function edit(Size $size)
    {
        $this->resetErrorBag();

        $this->sizeToUpdate = $size;
        $this->size = $size->size;
        $this->waist = $size->waist;
        $this->hip = $size->hip;
        $this->inside_leg = $size->inside_leg;
        $this->weight = $size->weight;
    }
    public function update()
    {
        $this->validate();

        $this->sizeToUpdate->update([
            'size' => $this->size,
            'waist' => $this->waist,
            'hip' => $this->hip,
            'inside_leg' => $this->inside_leg,
            'weight' => $this->weight,
        ]);

        $this->closeModal();

        $this->successAlert('Size Updated Successful!');
    }
    public function delete(Size $size)
    {
        $this->confirmDialog();
        $this->sizeToDelete = $size;
    }

    public function confirmed()
    {
        $this->sizeToDelete->delete();

        $this->alert('success', 'A Size Has Been Permently Deleted!');
    }

    public function clearForm()
    {
        $this->size = '';
        $this->waist = '';
        $this->hip = '';
        $this->inside_leg = '';
        $this->weight = '';
    }

    public function render()
    {
        return view('livewire.item.size-section', [
            'sizes' => Size::FilterSearch('size', $this->search)
                ->FilterSearch('waist', $this->search)
                ->FilterSearch('hip', $this->search)
                ->FilterSearch('inside_leg', $this->search)
                ->FilterSearch('weight', $this->search)
                ->orderBy('updated_at', 'desc')
                ->paginate(10),
            'headers' => $this->getHeaders('sizes'),
        ])->layout('admin.app');
    }
}
