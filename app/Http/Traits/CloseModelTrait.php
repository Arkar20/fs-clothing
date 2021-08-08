<?php

namespace App\Http\Traits;

trait CloseModelTrait
{
    public function closeModal()
    {
        return $this->dispatchBrowserEvent('close-modal');
    }
}
