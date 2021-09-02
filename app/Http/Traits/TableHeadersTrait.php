<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Schema;

trait TableHeadersTrait
{
    public function getHeaders($table = null)
    {
        return Schema::getColumnListing($table ?: $this->getTable());
    }
}
