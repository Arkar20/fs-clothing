<?php

namespace App\Models;

use App\Http\Traits\FilterFieldTrait;
use App\Http\Traits\TableHeadersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory, TableHeadersTrait, FilterFieldTrait;

    protected $guarded = [];
}
