<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Traits\TableHeadersTrait;
use Illuminate\Support\Facades\Request;

class Dropdownfield extends Component
{
    use TableHeadersTrait;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $label;
    public $options = [];
    public $model;
    public $name;
    public $value;
    public function __construct($label, $options, $model, $table = null)
    {
        $this->label = $label;
        $this->options = $options;
        $this->model = $model;
        // dd($table);
        $this->name = $this->getHeaders($table)[1];

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
