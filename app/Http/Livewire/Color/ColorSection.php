<?php

namespace App\Http\Livewire\Color;

use App\Http\Traits\CloseModelTrait;
use App\Http\Traits\ToastTrait;
use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;

class ColorSection extends Component
{
    use ToastTrait, CloseModelTrait, WithPagination;

    public $search;
    public $color;
    public $color_code;

    public $colorToUpdate;

    public function store()
    {
        Color::create([
            'color' => $this->color,
            'color_code' => $this->color_code,
        ]);
        $this->closeModal();

        $this->successAlert('Color Registered Successful');
        $this->clearForm();
    }
    public function edit(Color $color)
    {
        $this->colorToUpdate = $color;
        $this->color = $color->color;
        $this->color_code = $color->color_code;
    }
    public function update()
    {
        $this->colorToUpdate->update([
            'color' => $this->color,
            'color_code' => $this->color_code,
        ]);
        $this->closeModal();

        $this->successAlert('Color Update Successful');
        $this->clearForm();
    }
    public function delete(Color $color)
    {
        $color->delete();
        $this->errorAlert('Color Deleted Successful');
    }
    public function clearForm()
    {
        $this->color = '';
        $this->color_code = '';
    }
    public function render()
    {
        return view('livewire.color.color-section', [
            'colors' => Color::FilterSearch('color', $this->search)
                ->FilterSearch('color_code', $this->search)
                ->latest()
                ->paginate(10),
            'headers' => Color::first()->getHeaders(),
        ])->layout('admin.app');
    }
}
