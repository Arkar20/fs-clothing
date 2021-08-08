<?php

namespace App\Http\Traits;

trait FilterFieldTrait
{
    public function scopeFilterSearch($query, $field, $search)
    {
        return $query->when($search, function ($querysearch) use (
            $search,
            $field
        ) {
            return $querysearch->Orwhere($field, 'LIKE', '%' . $search . '%');
        });
    }
}
