<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $items;
    public $headers;
    public function __construct($data = null, $headers)
    {
        $this->items = $data;
        $this->headers = $headers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-layout');
    }
}
