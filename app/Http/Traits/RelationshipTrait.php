<?php

namespace App\Http\Traits;

use App\Models\ItemDetail;

trait RelationshipTrait{
    
    public function item_detail()
    {
        return $this->belongsTo(ItemDetail::class);
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