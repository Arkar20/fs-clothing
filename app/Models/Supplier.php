<?php

namespace App\Models;

use App\Models\Purchase;
use App\Http\Traits\FilterFieldTrait;
use App\Http\Traits\TableHeadersTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory, TableHeadersTrait, FilterFieldTrait;

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    protected $guarded = [];
}
