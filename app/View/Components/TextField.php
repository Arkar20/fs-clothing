<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextField extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     *
     *
     */
    public $label;
    public $type;
    public $model;

    public function __construct($label = null, $type = 'text', $model = null)
    {
        $this->label = $label;
        $this->type = $type;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.text-field');
    }
}
