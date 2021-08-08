<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Schema;

trait TableHeadersTrait
{
    public function getHeaders()
    {
        return Schema::getColumnListing($this->getTable());
    }
}
