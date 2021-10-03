<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Size;
use App\Models\Color;
use App\Models\PurchaseItem;
use Illuminate\Database\Eloquent\Model;
use Propaganistas\LaravelFakeId\RoutesWithFakeIds;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemDetail extends Model
{
    use HasFactory;
    protected $with = ['size', 'color','item'];

    public static function boot()
    {
        parent::boot();

        static::created(function ($detail) {
            $qty = $detail->item->total_qty;
            $detail->item()->update(['total_qty' => $qty + $detail->quantity]);
        });

        static::updated(function ($detail) {
            $detail->item()->update([
                'total_qty' => $detail->item->itemdetails()->sum('quantity'),
            ]);
        });

        static::deleted(function ($detail) {
            $detail->item()->update([
                'total_qty' => $detail->item->itemdetails()->sum('quantity'),
            ]);
        });
    }
    public function getItemName()
    {
        return $this->item->name;
    }
    public function getItemSize()
    {
        return $this->size->size;
    }
    public function getItemColor()
    {
        return $this->color->color;
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    
  

    protected $guarded = [];
}
