<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Dropdownfield extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $label;
    public $options = [];
    public $model;
    public $name;
    public function __construct($label, $options, $model)
    {
        $this->label = $label;
        $this->options = $options;
        $this->model = $model;
        $this->name = $options->first()->getHeaders()[1];

        // dd($this->headers[1]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdownfield');
    }
}
