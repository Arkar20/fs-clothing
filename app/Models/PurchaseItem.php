<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Purchase;
use App\Models\ItemDetail;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseItem extends Pivot
{
    public $incrementing = true;
    // protected $with=['item'];

    public function item_detail()
    {
        return $this->belongsTo(ItemDetail::class);
    }
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
     public function getItemName()
    {
        return $this->item_detail->item->name;
    }
    public function getItemSize()
    {
        return $this->item_detail->size->size;
    }
    public function getItemColor()
    {
        return $this->item_detail->color->color;
    }


}
