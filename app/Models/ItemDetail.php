<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemDetail extends Model
{
    use HasFactory;
    protected $with = ['size', 'color'];

    public static function boot()
    {
        parent::boot();

        static::saved(function ($detail) {
            $qty = $detail->item->total_qty;
            $detail->item()->update(['total_qty' => $qty + $detail->quantity]);
        });

        static::updated(function ($detail) {
            $qty = $detail->item->total_qty;
            $detail->item()->update(['total_qty' => $qty + $detail->quantity]);
        });
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
