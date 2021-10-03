<?php

namespace App\Models;

use App\Models\Supplier;
use App\Models\PurchaseItem;
use Illuminate\Support\Carbon;
use App\Http\Traits\FilterFieldTrait;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use Propaganistas\LaravelFakeId\RoutesWithFakeIds;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory,FilterFieldTrait,RoutesWithFakeIds;


    protected $guarded = [];
    protected $with = ['supplier'];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public static function boot()
    {
        parent::boot();
        static::saved(function ($model) {
            Cart::content()->each(function ($cart) use ($model) {
                $model->savePurchaseDetail($cart);
                $model->updateQty($cart);
            });
            Cart::destroy();
        });
    }

    public function updateQty($cart)
    {
        $this->findItemDetail($cart->id)->update([
            'quantity' =>
                $this->findItemDetail($cart->id)->quantity + $cart->qty,
        ]);

       return  $this->findItemDetail($cart->id)
            ->item()
            ->update([
                'total_qty' =>
                    $this->findItemDetail($cart->id)->item->total_qty +
                    $cart->qty,
                'purchase_count'=> $this->findItemDetail($cart->id)->item->purchase_count +
                    $cart->qty,
            ]);
    }
    public function findItemDetail($itemidincart)
    {
        return $this->purchase_items()->find($itemidincart);
    }
    public function savePurchaseDetail($cart)
    {
        // dd($cart);
        return $this->purchase_items()->attach($this, [
            'item_detail_id' => $cart->id,
            'price' => $cart->price,
            'quantity' => $cart->qty,
        ]);
    }
    public function purchase_items()
    {
        return $this->belongsToMany(ItemDetail::class, 'purchase_item')->using(
            PurchaseItem::class
        );
    }
    public function getItemDetails()
    {
        return $this->purchase_items()->itemdetails();
    }
   public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
    // public function getAllInformation()
    // {
    //     return $this->purchase_items()->with('item')->get();
    // }
    public function purchase_records()
    {
        return $this->hasMany(PurchaseItem::class);
    }
     
    // public function getTotalPrice()
    // {
    //     return $this->price * $this->quantity;
    // }

  
}
