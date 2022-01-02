<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Size;
use App\Models\Color;
use App\Models\PurchaseItem;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
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

    //!helpers
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
    public function getItemImage()
    {
        return $this->color->img1;
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
     public function getDetails($sizeId,$colorId)
    {
        return $this->item()
                    ->where('size_id', $this->size)
                    ->where('color_id', $this->color)
                    ->get()
                    ->first();
    }
    public function scopeFilterDetail($query,$data)
    {
        if($data['size']){ $query->where('size_id',$data['size']);}
       
        if($data['color']) { $query->where('color_id',$data['color']);}
      
       return $query->groupBy('id')->get();

    }
      public function getUniqueSize()
    {
        return $this->itemdetails()
            ->pluck('id', 'size_id')
            ->filter();
    }
    public function findItemDetialInCart()
    {
        return Cart::search(function ($cartItem, $rowId)  {
                return $cartItem->id === $this->id;
        });
    }
    public function getCartItemKey()
    {
        return $this->findItemDetialInCart()->first()->rowId;
    }
    public function itemIsInCart()
    {
        return Cart::search(function ($cartItem, $rowId)  {
            return $cartItem->id === $this->id;
        });
    }
    public function getQuantityInCart($qty)
    {
        if($this->itemIsInCart()->count()){
            return $this->itemIsInCart()->first()->qty + $qty;
        }
       return $qty;
    }
    public function configurePrice($qty)
    {
          //if the qty is exceeded, then set the price to retail price 
        //if not default one
         if( $this->item->retail_qty <=  $this->getQuantityInCart($qty))
        {
            return $this->item->retail_price;
        }
        return $this->item->price;
    }
    
  

    protected $guarded = [];
}
