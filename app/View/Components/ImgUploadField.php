<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImgUploadField extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $img;
    public $tempimg;
    public function __construct($model, $tempimg)
    {
        $this->img = $model;
        $this->tempimg = $tempimg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.img-upload-field');
    }
}
