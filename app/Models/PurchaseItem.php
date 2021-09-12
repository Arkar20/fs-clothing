<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseItem extends Pivot
{
    public $incrementing = true;
    protected $with=['item'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
