<?php

namespace App\Models;

use App\Http\Traits\RelationshipTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItemDetail extends Pivot
{

    use HasFactory,RelationshipTrait;

    public $incrementing = true;

    protected $with=['item'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
 
}
