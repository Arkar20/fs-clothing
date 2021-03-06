<?php

namespace App\Models;

use App\Models\Item;
use App\Http\Traits\FilterFieldTrait;
use App\Http\Traits\TableHeadersTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory, TableHeadersTrait, FilterFieldTrait;

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
