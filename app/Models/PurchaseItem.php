<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Purchase;
use App\Models\ItemDetail;
use App\Http\Traits\RelationshipTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseItem extends Pivot
{
    use RelationshipTrait;

    public $incrementing = true;
    // protected $with=['item'];

    
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    


}
