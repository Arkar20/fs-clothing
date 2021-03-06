<?php

namespace App\Http\Livewire\Color;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\ToastTrait;
use App\Http\Traits\CloseModelTrait;
use App\Http\Traits\TableHeadersTrait;

class ColorSection extends Component
{
    use ToastTrait, CloseModelTrait, WithPagination, TableHeadersTrait;

    protected $listeners = ['confirmed', 'cancelled'];
    protected $rules = [
        'color' => 'required|min:3|unique:colors',
        'color_code' => 'required|min:6',
    ];

    public $search;
    public $color;
    public $color_code;

    public $colorToUpdate;

    public $colorToDelete;

    public function store()
    {
        $this->validate();
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
        $this->resetErrorBag();

        $this->colorToUpdate = $color;
        $this->color = $color->color;
        $this->color_code = $color->color_code;
    }
    public function update()
    {
        $this->validate([
            'color' => 'required|min:3',
            'color_code' => 'required|min:6',
        ]);

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
        $this->colorToDelete = $color;
        $this->confirmDialog();
    }
    public function confirmed()
    {
        $this->colorToDelete->delete();
        $this->successAlert('Color has been deleted Permently!');
    }
    public function FunctionName(): Response
    {
        return $this->render('$0.html.twig', []);
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
            'headers' => $this->getHeaders('colors'),
        ])->layout('admin.app');
    }
}
